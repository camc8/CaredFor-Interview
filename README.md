# Laravel and Ionic appointment viewer

## Getting started:

- Clone this repo and enter the directory: `git clone https://github.com/camc8/CaredFor-Interview.git && cd CaredFor-Interview`
- Install Ionic CLI if it's not already installed: `npm install -g @ionic/cli`
- Enter the Laravel API directory: `cd api`
- Run `npm install`

### Setting up Laravel Valet (more info [here](https://laravel.com/docs/10.x/valet))

- Ensure homebrew is up to date: `brew update`
- Use homebrew to install PHP if necessary: `brew install php`
- Install composer if not already installed: [follow this guide](https://getcomposer.org/doc/00-intro.md)
- Install Laravel Valet using composer: `composer global require laravel/valet`
- Run the Valet install command: `valet install`

Now that Valet is installed, ensure the terminal is still on the api folder and run `valet link laravel-api`
The Laravel application will be live at http://laravel-api.test

- To import the CSV file to the database, ensure that `appointments.csv` is located in `api/storage/app/appointments.csv` and run `php artisan caredfor:import`
- To run the tests: `php artisan test`

- Now, cd into the ionic folder `cd ../ionic` and run `npm install`
- Run `ionic serve` to start the Ionic app. It should open a browser window and be live at http://localhost:8100

##### Notes and Comments

- Created an example API method to get the user data since creating a users table was not mentioned in the instructions
- Used moment.js for timezone support and conversion
- Assumed that the CSV file was properly formatted and validated, didn't do any validation
- Didn't write tests for Ionic portion since it was not mentioned in the requirements
- The `/appointments/full` API route loads provider and user data from each appointment as well
