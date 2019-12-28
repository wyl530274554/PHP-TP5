<meta name="viewport"
      content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<html>
<body>

<form>
    <div class="main" align="center">
        <img src="https://ss0.bdstatic.com/5aV1bjqh_Q23odCf/static/superman/img/logo/bd_logo1_31bdc765.png" width="270"
             height="130"/><br/><br/>
        <input id="content" style="height:40px;" class="normalInput" onBlur="inputLineDef(this)"
               onFocus="inputLineFocus(this)"/>
        <input type="button" value="百度一下" onClick="bt_sub()" style="height:40px"/><br/><br/>
        <!--
        <input type="button" value="新闻" onClick="bt_news()" style="height:40px"/>
        <input type="button" value="联系人" onClick="bt_contacts()" style="height:40px"/>
        -->
    </div>
    <div id="footer">
        Copy Right @2019 Melon
    </div>
</form>

</body>
</html>

<script language="javascript" type="text/javascript">
    function bt_contacts() {
        var str = prompt("输入密码", "");
        if (str == 'melon') {
            //alert("密码正确")
            location.href = 'http://xiazhilu.top/contacts';
        } else {
            alert("密码错误")
        }
    }

    function bt_news() {
        location.href = 'http://3g.163.com/touch/news';
    }

    function bt_sub() {
        var content = document.getElementById("content").value;
        location.href = 'https://m.baidu.com/s?word=' + content;
    }

    function inputLineDef(obj) {
        obj.className = "normalInput";
    }

    function inputLineFocus(obj) {
        obj.className = "focusInput";
    }

    document.onkeydown = keyDownSearch;

    function keyDownSearch(e) {
        // 兼容FF和IE和Opera    
        var theEvent = e || window.event;
        var code = theEvent.keyCode || theEvent.which || theEvent.charCode;
        if (code == 13) {
            //具体处理函数    
            bt_sub();
            return false;
        }
        return true;
    }
</script>

<style type="text/css">
    #footer {
        height: 40px;
        line-height: 40px;
        position: fixed;
        bottom: 0;
        width: 100%;
        text-align: center;
        background: #333;
        color: #fff;
        font-family: Arial;
        font-size: 12px;
        letter-spacing: 1px;
    }

    .main {
        position: absolute;
        top: 35%;
        left: 50%;
        width: 300px;
        height: 100px;
        margin-top: -100px;
        margin-left: -150px;
    }

    .normalInput {
        outline: none;
        border: 1px solid #b8b8b8;
    }

    .focusInput {
        outline: none;
        border: 1px solid green;
    }
</style>
