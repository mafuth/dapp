<!-- badge -->

[![Contributors](https://img.shields.io/badge/Contributors-93b023?style=for-the-badge&logo=Contributors&logoColor=white)](https://github.com/mafuth/php-CLI/contributors)
[![Forks](https://img.shields.io/badge/Forks-93b023?style=for-the-badge&logo=Forks&logoColor=white)](https://github.com/mafuth/php-CLI/fork)
[![Stargazers](https://img.shields.io/badge/Stars-93b023?style=for-the-badge&logo=Stars&logoColor=white)](https://github.com/mafuth/php-CLI/)
[![Issues](https://img.shields.io/badge/Issues-FFA500?style=for-the-badge&logo=Issues&logoColor=white)](https://github.com/mafuth/php-CLI/issues)

<!-- PROJECT LOGO -->
<br />
<div align="center">
  <h1 align="center">Simple PHP Comand Line Interface</h1>

  <p align="center">
    This project requires <b>PHP as an executable command</b>
  </p>
</div>

<!-- GETTING STARTED -->
# Installation

1. Clone the repo
   ```sh
   git clone https://github.com/mafuth/php-CLI.git
   cd php-CLI
   ```
2. Check for installation
   ```sh
   php cli --v
   ```
3. Configure the installation
   ```sh
   php cli --config
   ```
4. test connection to database
   ```sh
   php cli test data-base-connection
   ```
5. Start a local server
   ```sh
   php cli --serve
   ```
<!-- File layout -->
# ajax folder
This is where cli generates xml request files

# comands folder
This is where cli generates all you run-command files

# database folder
inside database/create is all the cli generates database table controllers

# handlers folder
This is where cli generates handle files

# plugins folder
This is where cli installs all plugins

# veiws folder
This is where you put you php code files that generate veiws on the front end

# requests file
This file handles all the requests to the server, edit this file as neede

# index and main files
Please do not edit these files as these are important components

# requests file
This file handles all the requests to the server, edit this file as needed

# config.ini file
This is the main config file of the server
```ini
[database configs]
servername = "database server address"
username = "database user name"
password = " database password"
dbname = "database name"

[maintanance mode (true = on 7 false = off)]
maintanance = false

[error reporting  (true = on 7 false = off)]
error = false

```

<!-- USAGE EXAMPLES -->
# Usage
### git commands
1. Configure git
```sh
git config --global user.name "Full Name as on github"
```
```sh
git config --global user.email "Email as on github"
```
On the next step press Enter to choose the default value
```sh
ssh-keygen -t rsa -C "Email as on github"
```
```sh
notepad ~/.ssh/id_rsa.pub
```
Now go to https://github.com/settings/keys and add the key you just generated / opened on note pad , save the ssh keys

2. Test git
```sh
ssh -T git@github.com
```
If you see a message like 'Hi user! You've successfully authenticated, but GitHub does not provide shell access.' then everything is okay 

```sh
php cli --git
```
   
### create command

Create a database table (replace '-- your table name --' with any name of your choice)
   ```sh
   php cli create table -- your table name --
   ```
Create a handler for post request (replace '-- your handler name --' with any name of your choice)
   ```sh
   php cli create handler -- your handler name --
   ```
Create a ajax request handler for all xml requests (replace '-- your handler name --' with any name of your choice)
   ```sh
   php cli create ajax -- your handler name --
   ```
Create a new run command (replace '-- your command name --' with any name of your choice)
   ```sh
   php cli create run-command -- your command name --
   ```

### Data base tables command

Drop all tables and delete create function files
   ```sh
   php cli drop-tables
   ```
or use
   ```sh
   php cli drop-table -- your table name --
   ```
   
if want edit a table layout just edit the table lay out file at (database/create) directory and run the command below
   ```sh
   php cli recreate-tables
   ```
or use
   ```sh
   php cli recreate-table -- your table name --
   ```
   

   
### run command
This command is used to run scripts created using (php cli create run-command -- your command name -- )
   ```sh
   php cli run -- your command name --
   ```
### PWA command
This command is used generate PWA code for ur website
   ```sh
   php cli pwa-code
   ```
   
### plugin install command
This command is used to install custom made plugins to cli
   ```sh
   php cli install -- your plugin updater.json file url --
   ```

<!-- examples EXAMPLES -->
# Examples for plugin json files

Plugin information (file name must be info.json)
   ```json
   [
    {
        "name":"demo plugin one",
        "version":"0.1",
        "update":"url to get update data (example provided below)",
        "loader":"autoloader.php",
        "icon":"url for plugin icon",
        "description":"plugin short description",
        "created by":"your github user name"
    }
  ]
   ```
   Plugin updater
   ```json
  [
    {
        "url":"url to zip file of plugin",
        "name":"name of the plugin",
        "version":"current version of the plugin"
    }
  ]
   ```


<!-- CONTRIBUTING -->
# Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!
