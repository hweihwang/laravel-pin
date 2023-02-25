Laravel PIN
====================

This is a simple Laravel application that allows users to play a game of PIN.

Instructions
------------

Change the PIN to match the one displayed on the screen. You have 3 tries to get it right. If you get it wrong, the PIN
will change. If you get it right, you will be able to play again.

Simply change the configs at `app/app/Modules/PIN/Actions/InitPinConfigsAction.php` to change the PIN length, number of
tries, and various other settings. 

Remember to restart the container after making changes. You can do this by running `docker-compose restart app`

Or simply facilitate the `docker-composer.dev.yml` file to play around without the overhead of the container.



Installation
------------

To run this repo, follow these steps:

1. Clone the repository:

`git clone https://github.com/hweihwang/laravel-pin.git`

2. Navigate to the project directory:

`cd laravel-pin`

3. Make the `make.sh` script executable:

`chmod +x ./make.sh`

4. Run the script:

`./make.sh`

5. Wait for the script to finish running. It will take a few minutes to build the Docker image and start the container.

6. Your application should now be running at `http://localhost:19000`

Prerequisites
-------------

Before running this repo, ensure that you have Docker installed on your system.

Technologies Used
-----------------

- Docker
- Laravel
- Laravel Octane
- InertiaJS
- TailwindCSS
- Vue 3
- Vite
