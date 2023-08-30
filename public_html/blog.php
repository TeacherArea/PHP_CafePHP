  <?php 
    define("TITLE", "Cafe PHP | BLOG");
    require '../resources/templates/header.php';
    require '../resources/settings/global.inc.php';
    include 'pages/blog-welcome.php';

    if(true)
    {
        include 'pages/blog-sign-in.php';
    }

    if(false)
    {
        include 'pages/blog-writearticles.php';
    }

    $articles = FetchBlogArticles();
    $comments = FecthBlogComments();
    
    echo "<div class='init-container'>";

      if(!empty($articles))
      {
        foreach($articles as $article)
        {
          echo  "<h3 class='init-blog-articlehead'>" 
                . $article['title'] . "</h3>
                <h4 class='init-blog-articleauthor'>By: " . $article['username'] . "</h4>
                <h5 class='init-blog-articledate'>Published: " . $article['pubdate'] . "</h5>
                <p class='init-blog-articletext'>" .  $article['text'] . "</p>";
          if(!empty($comments) and $article['articleID'] == $comments[0]['articleID'])
          {
            foreach($comments as $comment)
            {
              echo "<h4 class='init-blog-commenthead'>comments</h4>";
              echo "<p class='init-blog-commentdetails'>name: " . $comment['name'] . "<br />posted: "   . $comment['pubdate'];
              echo "<article class='init-blog-commentwhitebox init-text-black'>";
              echo "<p>" . $comment['text'] . "</p>";
              echo "</article>";
            }
          }

          else
          {
            echo "<p class='init-blog-nocomment'>No comments yet.</p>";
          }
        }
      }

      else
      {
        header("Location: " . PAGE_NOT_FOUND);
      }

    echo "</div>";
    echo "<div class='footer-push'></div>";
    echo "</div>";

    include '../resources/templates/footer.php';
  ?>