# JSON SQL
# SELECT concat('[{', GROUP_CONCAT( concat_ws(',', concat('"id":"',id,'"'),concat('"user_id":"',user_id,'"'),concat('"img_path":"',img_path,'"'),concat('"profile_status":"',profile_status,'"') ) SEPARATOR '},{'),'}]') AS user_profile FROM user_profile



# Steps during First execution
#   1. Change RewriteBase in .htaccess file in public folder.
#   2. Change the URL_ROOT variable in main.js to your project name
#   3. Change url_redirect's header to point in your project
#   4. Change the URL_ROOT in init.php in controller's folder to point in your project.
#   5. In setup's folder in your views the ch_admin.php file, change your src to point in correct project folder.