# STORJ-Storagenode-Configuration-Script-Collection

![grafik](https://user-images.githubusercontent.com/125383356/219098830-edfea5b3-1f3e-43d6-aac1-7b34a5d0c0fd.png)
![grafik](https://user-images.githubusercontent.com/125383356/219098914-98d1cd30-ef72-4f4f-ba76-cb82ef809346.png)

Storj-Media-Kit files are from here: https://www.storj.io/media-kit (These graphics are not necessary for the use of the scripts!)

A simple shell-script-collection to set up a STORJ-Storagenode according to official requirements in a simple way.

This is a collection of scripts for creating a Storj storagenode according to official criteria, either via bash in the shell or with graphical web input mask and Shell in a Box.

The current state is that the scripts have not yet been fully translated to English. (The outputs are in German!)
The scripts should work as far as possible under DEBIAN (10+), but if you notice a malfunction of any kind, please contact me.

The only goal of the project was to automate and simplify the storagenode creation. I'm forgiven if the code quality isn't too good, I'm not a professional programmer and just wanted to show herewith a kind of "proof of concept" how it could be done.

I hope it can be useful for some users.

<p><h1>Installation</h1></p>

1. Deflate archive with "unzip STORJ_WEB.zip" in your home directory
2. Make "start.sh" executeable with "chmod +x start.sh"
3. Execute "start.sh" with "sudo bash start.sh"
4. Follow the instructions in the scripts or on web (The configured Web-Port is 8080)
5. If you have finished your web-task, you can execute "sudo bash cleanup" which is shutting down and disabling nginx and shellinabox
