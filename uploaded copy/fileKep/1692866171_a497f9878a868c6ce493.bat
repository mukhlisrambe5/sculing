@echo off

rem Launcher script for GoogleDriveFS.exe that looks up the latest
rem GoogleDriveFS.exe and runs it with the same arguments as the script.
rem Convenient to use as a target for Windows shortcuts.

rem Use '!' instead of '%' for variable names.
setlocal EnableDelayedExpansion

setlocal EnableExtensions

rem
rem First try looking in the registry.
rem
set COMMAND="reg.exe query HKLM\Software\Microsoft\Windows\CurrentVersion\Uninstall\{6BBAE539-2232-434A-A4E5-9A33560C6283}  /v InstallLocation"
rem Get the 3rd and following tokens of the 2nd line separated by space.
for /f "skip=1 tokens=2,* usebackq" %%A in (`!COMMAND!`) do (
  set EXE_PATH=%%B
)

rem Run the exe specified in InstallLocation if it exists and the name is right.
if exist "!EXE_PATH!" (
  if /I "!EXE_PATH:~-17!" equ "GoogleDriveFS.exe" (goto :RUN_IT)
)

rem
rem If we fail, look in the current directory.
rem
set DRIVE_FS_DIR=%~dp0

rem Sort DRIVE_FS_DIR's subdirectories (/a:d) by reverse date (/o:-d) of
rem creation (/t:c) and find the first one that contains the exe.
for /f "usebackq" %%A in  (`dir "%%DRIVE_FS_DIR%%\*" /a:d /o:-d /t:c /b`) do (
  set EXE_PATH=!DRIVE_FS_DIR!\%%A\GoogleDriveFS.exe
  if exist "!EXE_PATH!" (goto :RUN_IT)
)

:FAIL
@echo Fatal error: Can't find DriveFS path. Please reinstall Drive for Desktop.
pause
exit /b 1

:RUN_IT
@echo Found path: !EXE_PATH!
start "Launch Google Drive" "!EXE_PATH!" %*
exit /b 0
