<!doctype html>
<html>
<head>
    <script>
        function CheckOnlineStatus(msg) {
            var status = document.getElementById("status");
            var condition = navigator.onLine ? "ONLINE" : "OFFLINE";           
            var state = document.getElementById("state");
            state.innerHTML = condition;           
        }
        function Pageloaded() {
            CheckOnlineStatus("load");
            document.body.addEventListener("offline", function () {
                CheckOnlineStatus("offline")
            }, false);
            document.body.addEventListener("online", function () {
                CheckOnlineStatus("online")
            }, false);
        }
    </script>
    <style>
        ...</style>
</head>
<body onload="Pageloaded()">
    <div id="status">
        <p id="state">
        </p>
    </div>  
</body>
</html>