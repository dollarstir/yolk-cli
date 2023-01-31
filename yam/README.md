# phpyolk
Yolk is a PHP framework that helps to easily build web applications. Comes with in-built CRUD funtionalities and has custom Ui Structure.

# folder structure

- fragement
- Plugins
- Processor
- Settings
-  ui
- Storage
- Yolkassets
- Yolkcss



# fragement
- contains components that can be inlcuded in our project using the involve('thefilename')


# Plugins 
- Where plugins are installed and used in your projects

# Processor
- contains both javascript & Php files where you can use to hadle ajax request (optional)

# Settings 
- you link all your css, Yolkcss, js and favicons if you are using Yolk Ui (compulsory) .   (optional) if you are using yolk assistant with html template

# storage 
 - Contains the Database of your project .
 - All migration will beb done in Database.php file
 


# Ui
- Ui folder contains Yolk UI libraries

# Yolkassets 
- Store images,videos,audios,css,jss,icons etc (compulsory) if you are using Yolk Ui. (optional) if you are using yolk assistant with html template
- it stores uploaded files automatically into (yolkassets/upload)

# Yolkcss 
- Contains the style.php file in which you style your pages  with php (yolkcss) for only Yolk Ui. 
