<?php
   $dbHost = ' aws-0-ap-southeast-1.pooler.supabase.com';
   $dbUser = 'postgres.hmlgznqoglkiagohsdbj';
   $dbPassword = 'estrellassql0829';

   $conn = pg_connect("host=$dbHost port=5432 dbname=postgres user=$dbUser password=$dbPassword sslmode=require");
   if(!$conn){
    exit('Database connection failed.');
   }
?>