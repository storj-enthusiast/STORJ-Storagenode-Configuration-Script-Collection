<!DOCTYPE html>
<meta charset="UTF-8">
<html>
  <head>
    <title>Storagenode-Creator</title>
    <link rel="icon" type="image/png" href="storj-favicon.png"/>
  </head>
<style>

html, body{
	height:100%;
  font-family: Arial;
  font-size: 16px;
}

 body {
    background-color: white;
    background-image: linear-gradient(to bottom right, rgb(255, 255, 255), rgb(1, 73, 255));
    background-size: cover;
    background-attachment: fixed;
}

.inText {
    background: rgb(255, 255, 255);
    color: black;
    border-radius: 6px;
    width: 60%;
    max-width: 400px;
    height: 32px;
    margin: 1px 0;
  }

  .inText:hover {
    background:rgb(59, 59, 59);
    color: rgb(255, 255, 255);
  }

  textarea {
    background: rgb(255, 255, 255);
    color: black;
    border-radius: 6px;
    margin: 1px 0;
  }

  textarea:hover {
    background:rgb(59, 59, 59);
    color: rgb(255, 255, 255);
  }
  
@media (prefers-color-scheme: dark) {
  body {
    color: rgb(202, 202, 202);
    background-color: rgb(12, 12, 12);
    background-image: linear-gradient(to bottom right, rgb(12, 12, 12), rgb(2, 24, 167));
    background-size: cover;
    background-attachment: fixed;
  }

  .inText {
    background: rgb(202, 202, 202);
    border-radius: 6px;
    width: 60%;
    height: 32px;
    margin: 1px 0;
  }

  .inText:hover {
    background:rgb(121, 121, 121);
    color: rgb(230, 230, 230);
  }

  textarea {
    background: rgb(202, 202, 202);
    border-radius: 6px;
    margin: 1px 0;
  }

  textarea:hover {
    background:rgb(121, 121, 121);
    color: rgb(230, 230, 230);
  }
}

.split {
  height: 100%;
  width: 50%;
  position: fixed;
  z-index: 0;
  top:auto;
  overflow-x: hidden;
}

.left {
  top: 5px;
  height: 100%;
  width: 30%;
  position: relative;
  float: left;
  bottom: auto;
}

.right {
  top: 5px;
  height: 100%;
  width: 70%;
  position: relative;
  float: right;
  bottom: auto;
  overflow-y: hidden;
}
.right #shell {
	width:		99%;
	height:		98%;
  border-radius: 15px;
  border: 0px;
}

.logo source, img {
  width: 10%;
  max-width: 15%;
  height: auto;
  margin-left: auto;
  margin-right: auto;
  display: block;
}

.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgb(200, 0, 0);
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: rgb(255, 255, 255);
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: rgb(12, 176, 0);
}

input:focus + .slider {
  box-shadow: 0 0 1px rgb(12, 176, 0);
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

.Satellites {
  font-weight: bold;
}

.Button {
  background-color: rgb(12, 176, 0);
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 18px;
  border-radius: 34px;
  cursor:pointer;
}

.Button:hover {
    border-style: outset;
    border-width: 2px;
    box-shadow: none;
    background: #1e9f14; 
}

.Button:focus {
  background-color:#1a8e12;
}

#refresh {
  background-color: rgb(199, 181, 22);
}

#refresh:hover {
  background: orange;
}

#refresh:focus {
  background: rgb(140, 99, 21);
}

#nmbr {
  width: 15%;
  max-width: 15%;
  min-width: 52px;
}

#wallet {
  resize: none;
  height: 35px;
}

textarea {
   resize: none;
   height: 75px;
   width:  60%;
   max-width: 400px;
}

#overlay {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5);
  z-index: 2;
  cursor: pointer;
}

#storj_token {
  position: absolute;
  top: 20%;
  left: 40%;
  width: 330px;
  height: 350px;
  border: none;
}

</style>
  <body onload="document.STORJFORM.reset();">
    <script>
      var ip = "<?php echo $_SERVER['SERVER_ADDR']; ?>";
    </script>
    <div id="overlay" title="Hier klicken, um zurück zu gehen.">
      <iframe id="storj_token" src="" ></iframe>
    </div>
    <div class="header" id="storj_header">
      <div class="logo">
        <picture>
          <source srcset="storj-dark.png"  media="(prefers-color-scheme: dark)">
          <img src="storj-light.png" alt="STORJ">
        </picture>
      </div>
    </div>
    <div id="left" class="split left">
      <h2>Gib die Parameter für die Storj-Installation an:</h2>
        <form id="storj-form" name="STORJFORM" onsubmit="return false">
          <p>
            <label for="nmbr">Wähle eine Storagenode:</label>
            <p><input required class="inText" id="nmbr" name="nmbr" type="number" min="1" max="100" value="1"></p>
          </p>
          <p>
            <label for="path">Storj-Speicherpfad:</label>
            <p><input required class="inText" id="path" name="directory" type="text" placeholder="/mnt/storj"/></p>
          </p>
          <p>
            <label for="storage">Speichergröße:</label>
            <p><input required class="inText" id="storage" name="storage" type="text" placeholder="2TB"/></p>
          </p>
          <p>
            <label for="wallet">Ethereum-Wallet:</label>
            <p><textarea required id="wallet" name="wallet" type="text" placeholder="0x1A2B3C4D5E6F"></textarea></p>
          </p>
          <p>
            <label for="email">E-Mail-Adresse:</label>
            <p><input required class="inText" id="email" name="email" type="text" placeholder="max.mustermann@test.de"/></p>
          </p>
          <p>
            <label for="address">DynDNS-Adresse:</label>
            <p><input required class="inText" id="address" name="address" type="text" placeholder="w2k22.ddns.net"/></p>
          </p>
          <p>
            <label for="porttcp">TCP-Port:</label>
            <p><input required class="inText" id="porttcp" name="porttcp" type="text" placeholder="28967"/></p>
          </p>
          <p>
            <label for="portudp">UDP-Port:</label>
            <p><input required class="inText" id="portudp" name="portudp" type="text" placeholder="28967"/></p>
          </p>
          <p>
            <label for="portweb">Webserver-Port:</label>
            <p><input required class="inText" id="portweb" name="portweb" type="text" placeholder="14002"/></p>
          </p>
          <p>
            <label for="fetch_token">Lade Overlay und generiere einen Storj-Authtoken von der offiziellen Website</label>
            <p>
              <input type="button" class="Button" id="fetch_token" value="Hole Token" onclick="show_overlay();"/>
            </p>
          </p>
          <p>
            <label for="authtoken">Authtoken (Nur notwendig, falls Du eine neue Node erstellst!):</label>
            <p><textarea id="authtoken" name="authtoken" type="text" placeholder="max.mustermann@test.de:1YpnRGNmMKCVWR7zdCkTsfFYuzz5ddeMz4HzMKvP96eXnXDamxiK1EerBdHMvFgPj5WnbvkpQpArxjTw7p9wrZWaXabjHm"></textarea></p>
          </p>

          <h2>Gib die Anmeldedaten für diesen Server ein:</h2>

          <p>
            <label for="linuxuser">Benutzername:</label>
            <p><input required class="inText" id="linuxuser" name="user" type="text"/></p>
          </p>
          <p>
            <label for="passwd">Passwort:</label>
            <p><input required class="inText" id="password" name="passwd" type="password"/></p>
          </p>

          <p>
            <label for="zkoptin">Möchtest Du zksync für deine Wallet aktivieren?</label>
            <p>
              <label class="switch">
                <input id="zkoptin" name="zkoptin" type="checkbox" checked>
                <span class="slider round"></span>
              </label>
            </p>
          </p>
          <p>
            <label for="watchtower">Möchtest Du den Watchtower (automatischer Updatedienst) aktivieren?</label>
            <p>
              <label class="switch">
                <input id="watchtower" name="watchtower" type="checkbox" checked>
                <span class="slider round"></span>
              </label>
            </p>
          </p>
          <h2>Welche Satelliten möchtest Du nutzen?</h2>
          <p>
            <p>
              <label class="switch">
                <input id="US1" name="US1" type="checkbox" checked>
                <span class="slider round"></span>
              </label>
              <label class="Satellites" for="US1">US1</label>
            </p>
          </p>
          <p>
            <p>
              <label class="switch">
                <input id="EU1" name="EU1" type="checkbox" checked>
                <span class="slider round"></span>
              </label>
              <label class="Satellites" for="EU1">EU1</label>
            </p>
          </p>
          <p>
            <p>
              <label class="switch">
                <input id="AP1" name="AP1" type="checkbox" checked>
                <span class="slider round"></span>
              </label>
              <label class="Satellites" for="AP1">AP1</label>
            </p>
          </p>
          <p>
            <p>
              <label class="switch">
                <input id="SALTLAKE" name="SALTLAKE" type="checkbox" checked>
                <span class="slider round"></span>
              </label>
              <label class="Satellites" for="SALTLAKE">Saltlake</label>
            </p>
          </p>
          <p>
            <p>
              <label class="switch">
                <input id="US2" name="US2" type="checkbox" checked>
                <span class="slider round"></span>
              </label>
              <label class="Satellites" for="US2">US2</label>
            </p>
          </p>
          <p>
            <p>
              <label class="switch">
                <input id="EUNORTH" name="EUNORTH" type="checkbox" checked>
                <span class="slider round"></span>
              </label>
              <label class="Satellites" for="EUNORTH">EU-North</label>
            </p>
          </p>
          <p>
            <button type="submit" id="start" class="Button">Start</button>
            <input type="button" id="refresh" class="Button" value="Refresh-Page" onclick="window.location.reload();"/>
          </p>
        </form>
      </div>
      <div id="right" class="split right">           
	      <iframe id="shell" src=""></iframe>
      </div>
  <script>
    var url = `http://${ip}:4200`;
    var iframe_siab  = document.getElementById("shell");
    var iframe_storj = document.getElementById("storj_token");

    iframe_siab.src = url;

    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }

    function show_overlay(){
      iframe_storj.src = "https://registration.storj.io/iframe";
      document.getElementById("right").style.display = 'none';
      document.getElementById("overlay").style.display = "block";
    }

    function hide_overlay(){
      document.getElementById("overlay").style.display = "none";
      document.getElementById("right").style.display = 'block';
    }

    document.getElementById("overlay").addEventListener("click", function(){
      hide_overlay();
    });

    function disable_refresh() {
      document.getElementById("refresh").removeAttribute("onclick");
      document.getElementById("refresh").style.background = "darkgray";
    }

    function enable_refresh() {
      document.getElementById("refresh").setAttribute("onclick", "window.location.reload();");
      document.getElementById("refresh").style.background = 'rgb(' + '199' + ',' + '181' + ',' + '22' + ')';
    }

    document.getElementById("start").addEventListener("click", async function() {
      var requiredFields = document.querySelectorAll('[required]');
      var valid = true;
    
      for (var i = 0; i < requiredFields.length; i++) {
        if (!requiredFields[i].value) {
          alert('Bitte füllen Sie das erforderliche Feld ' + requiredFields[i].name + ' aus.');
          valid = false;
        }
      }
    
      if (!valid) {
        return false;
      }
    
      disable_refresh();
    
      var username, password;
      var command;
    
      var message = JSON.stringify({
    		type : 'reconnect'
    	});
      iframe_siab.contentWindow.postMessage(message, url);
    
      await sleep(250);
    
      username = document.getElementById('linuxuser').value;
      password = document.getElementById('password').value;
    
      login(username, password);
    
      var formData = new FormData(document.getElementById("storj-form"));
      formData.delete("user");
      formData.delete("passwd");
    
      await sleep(250);
    
      request_php(formData);
    
      command = 'bash storj-new-webserver';
      sudo_command(command, password);

      setInterval(function(){
        fetch(`http://${ip}:8080/finished.php`)
        .then(response => response.json())
        .then(data => {
            if (data.bash_finished.trim() == "OK") {
              enable_refresh();
              normal_command('logout');
            }
        });
      }, 10000);


    });

    async function login (u, p) {
      var message = JSON.stringify({
        type: 'input',
        data: u + '\n'
      });
      iframe_siab.contentWindow.postMessage(message, url);

      await sleep(100);
    
      message = JSON.stringify({
        type: 'input',
        data: p + '\n'
      });
      iframe_siab.contentWindow.postMessage(message, url);
    }

    async function sudo_command (c, p) {
      var message = JSON.stringify({
        type: 'input',
        data: 'sudo ' + c + '\n'
      });
      iframe_siab.contentWindow.postMessage(message, url);
    
      await sleep(100);
    
      message = JSON.stringify({
        type: 'input',
        data: p + '\n'
      });
      iframe_siab.contentWindow.postMessage(message, url);
    }

    function normal_command (c) {
      var message = JSON.stringify({
        type: 'input',
        data: c + '\n'
      });
      iframe_siab.contentWindow.postMessage(message, url);
    }

    document.getElementById('shell').addEventListener('keydown', function() {
      var message = JSON.stringify({
        type: 'input',
        data: '\u0009'
      });
      iframe_siab.contentWindow.postMessage(message, url);
    });

    document.getElementById('left').addEventListener("keypress", function(event) {
      if (event.key === "Enter") {
        event.preventDefault();
        document.getElementById("start").click();
      }
    });

    document.getElementById('password').addEventListener("click", function() {
      if (sessionStorage.getItem("hide_alert") == "set") {
        return false;
      }
      alert("ACHTUNG! Dies ist eine reine HTTP-Verbindung, das Passwort wird unverschlüsselt zwischen Client und Server übertragen.\
      Dies ist in einem privaten (W)LAN-Netzwerk nahezu unbedenklich, diese Formularseite sollte jedoch NIEMALS frei ins Internet gestellt werden!")
      sessionStorage.setItem("hide_alert", "set");
    });

    function request_php(formData){
      var object = {};
      formData.forEach((value, key) => object[key] = value);
      var json = JSON.stringify(object);
    
      var request = new XMLHttpRequest();
      request.open("POST", `http://${ip}:8080/storj_variables.php`, true);
      request.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
      request.send(json);
    }
  </script>
  </body>
</html>