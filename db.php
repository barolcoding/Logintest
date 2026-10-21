<?php
   $dbHost =  getenv(' aws-0-ap-southeast-1.pooler.supabase.com');
   $dbUser = getenv('postgres.hmlgznqoglkiagohsdbj');
   $dbPassword = getenv('estrellassql0829');
   $dbPort = getenv('8080');
   $dbName = getenv('postgres');

   $conn = pg_connect("host=$dbHost port=5432 dbname=postgres user=$dbUser password=$dbPassword sslmode=require");
   if(!$conn){
    exit('Database connection failed.');
   }
?>