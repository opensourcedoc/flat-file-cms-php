@echo off
rem Run a PHP site locally with a builtin web server of PHP.


rem Check whether PHP is available on the system.
php --version >nul || (
    echo No PHP on the system >&2
    exit /b 1
)

rem Check whether Composer is available on the system.
call composer --version >nul || (
    echo No Composer on the system >&2
    exit /b 1
)

rem Get an address.
set address=%1
if "" == "%address%" (
    set address=localhost:5000
)

rem Get working directory of current batch script.
set cwd=%~dp0
rem Get the path to the tool executables.
set bin=%cwd%..\bin
rem Get the path to the tool library.
set lib=%cwd%..\lib
rem Get the path to the PHP scripts.
set libexec=%cwd%..\libexec
rem Get the root path.
set root=%cwd%..\..

rem Generate site settings if it doesn't exist.
if not exist %lib%\settings.bat (
    call %bin%\init.bat || (
        exit /b %ERRORLEVEL%
    )
)

rem Load site settings.
call %lib%\settings.bat

rem Download third-party PHP packages if they don't exist.
if not exist %root%\vendor (
    call composer install --no-dev || (
        exit /b %ERRORLEVEL%
    )
)

rem Create a 404.html
call %bin%\404.bat || (
    exit /b %ERRORLEVEL%
)

rem Load assets.
call %bin%\assets.bat || (
    exit /b %ERRORLEVEL%
)

rem Copy static files.
xcopy /s /y %root%\static %root%\public || (
    echo Unable to copy static files to the public directory >&2
    exit /b 1
)

rem Copy PHP scripts.
xcopy /s /y %root%\www %root%\public || (
    echo Unable to copy PHP scripts to public directory >&2
    exit /b 1
)

rem Monitor asset change(s).
cd %root% && start "" npm run watch

rem Run a PHP site locally.
echo Run a PHP site locally. Press ctrl + c to stop the server.
php -S %address% -t %root%\public
