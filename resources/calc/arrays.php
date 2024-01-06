
<?php
// NAVIGATION
  $navigation = array
    (
      array(
          'nav' => 'index.php',
          'title' => 'HOME'
          ),
      array(
          'nav' => 'coffee.php',
          'title' => 'WORLD OF COFFEE'
          ),
      array(
          'nav' => 'blog.php',
          'title' => 'BLOG'
          ),
      array( 
          'nav' => 'about.php',
          'title' => 'ABOUT'  
          ),
      array( 
          'nav' => 'contact.php',
          'title' => 'CONTACT'
          ),
      );

    echo "<ul>";
      foreach ($navigation as $item)
        {
          echo "<li><a href='$item[nav]'>$item[title]</a></li>";
        }
    echo "</ul>";

//ABOUT US
  $staff = array
    (
        array
          (
              'name' => 'Jane Doe',
              'position' => 'CEO & coffelover',
              'bio' => 'Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.',
              'img' => 'jane'
          ),
        array
          (
              'name' => 'Mike Ross',
              'position' => 'Baristageneral & coffelover',
              'bio' => 'Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.',
              'img' => 'mike'
          ),
        array
          (
              'name' => 'Dan Star',
              'position' => 'Barista & coffelover',
              'bio' => 'Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.',
              'img' => 'dan'
          ),
    );
?>