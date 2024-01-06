<?php
    require 'dbsettings.php'; 
    
    function DB_OpenCon()
    {
        $attributes = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,        // Kastar undantag (try/catch) vid fel
        PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,         // Använder vid true den buffrade version av mysqls api
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,   // Innehållet i databasen blir till en array  
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8;    
                                         SET time_zone = '" . DB_TIMEZON . "';
                                         SET sql_safe_updates = 1, sql_select_limit = 1000, sql_max_join_size = 1000000;
                                         SET SESSION sql_mode = STRICT_ALL_TABLES, NO_ZERO_DATE, NO_ZERO_IN_DATE;" 
                                                            // MYSQL_ATTR_INIT_COMMAND har lite olika kommandon för att
                                                            // till exempel ställa in tidszon, hur mycket uppdateringar som 
                                                            // tillåts för databasen på samma gång (1), hur mycket data som ges
                                                            // tillåtelse att hämta i en förfrågan, etc
        );
        
        try
        {
            $con = new PDO('mysql:host=' . DB_HOST . '; dbname=' . DB_NAME, DB_USER, DB_PASS, $attributes);     
            return $con;
        }
        
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    function DB_CloseCon($con)
    {
        $con = null;
    }

    function FetchBlogArticles()
    {
        $con = DB_OpenCon();            // $con tilldelas en öppnad databaskoppling
        $sql = "SELECT *
                FROM articles
                INNER JOIN users
                ON articles.articleID = users.userID
                ORDER BY pubdate
                DESC LIMIT 0,5";        // $sql tilldelas en sql-förfrågan som string
        $stmt = $con -> prepare($sql);  // prepare() förbereder för utförandet. prepare()
                                        // ger möjlighet att ställa in PDO::VALBARA_PARAMETRAR* (rad 7-13)
                                        // query() skulle utföra förfrågan direkt, utan möjlighet
                                        // till parametrar*.

        $stmt -> execute();             // utför själva förfrågan mot databasen, efter att ev. parametrar*
                                        // tagits hänsyn till.
        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                                        // fetchAll() hämtar ut resultatet från databasen, och 
                                        // skapar en snygg arrray av innehållet
        DB_CloseCon($con);
        return $articles;
    }

    function FecthBlogComments()
    {
        $con = DB_OpenCon();
        $sql = "SELECT * 
                FROM comments";
        $stmt = $con -> prepare($sql);
        $stmt -> execute();
        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($comments as &$cmt)
        {
            $cmt['name'] = htmlspecialchars($cmt['name'], ENT_QUOTES);
            $cmt['text'] = htmlspecialchars($cmt['text'], ENT_QUOTES);
            $cmt['email'] = htmlspecialchars($cmt['email'], ENT_QUOTES);
            $cmt['website'] = htmlspecialchars($cmt['website'], ENT_QUOTES);
        }
        DB_CloseCon($con);
        return $comments;
    }

    function RegisterNewUser($newuser)
    {
        // Här får du fixa till en sql-förfrågan med INSERT INTO ...
        // Glöm inte att öppna databasen först, och sen stänga den.
    }
?>