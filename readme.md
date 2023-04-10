# Boombit conf
    Theme for technical test based in wp. The theme is based in Timber, uses boostrap 5, sass for styling and all js and css is compiled through webpack and babel. For running in a development env, I use docker with a docker compose file to run up multiple services.
    
    The main features are the use of twig/timber in the single-conference template and the acf block that shows conferences depending of qty you select on the blocks settings.

## For running in your local env

1. Download the repo.
1. Start docker.
1. Create .env file using the env.example file.
1. Run docker-compose up -d in the root of the project. Wait for all the containers to run.
1. Upload database file using php my admin in localhost:9090 to and import it to the database with the name you selected in .env file.
1.Run the managePlugin.sh file in the root of the project.
1. Now everything should be set up for use.

