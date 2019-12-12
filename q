[1mdiff --git a/css/layout.css b/css/layout.css[m
[1mindex a7f8d8c..33f35c7 100644[m
[1m--- a/css/layout.css[m
[1m+++ b/css/layout.css[m
[36m@@ -12,6 +12,7 @@[m [mbody {[m
 /* Header Layout */[m
 body > header {[m
     height: 3.0em;[m
[32m+[m[32m    width: 100%;[m
 }[m
 [m
 body > header h1 {[m
[1mdiff --git a/css/main_page.css b/css/main_page.css[m
[1mindex 58390cd..bfc60a4 100644[m
[1m--- a/css/main_page.css[m
[1m+++ b/css/main_page.css[m
[36m@@ -96,18 +96,6 @@[m
     background-color: #3542f0;[m
 }[m
 [m
[31m-#recommended .info p:nth-child(2)::before {[m
[31m-    content: 'Sleeps: ';[m
[31m-}[m
[31m-[m
[31m-#recommended .info p:nth-child(3)::before {[m
[31m-    content: 'Price per day: ';[m
[31m-}[m
[31m-[m
[31m-#recommended .info p:nth-child(3)::after {[m
[31m-    content: '$';[m
[31m-}[m
[31m-[m
 #recommended article h3 {[m
     color: white;[m
     font-weight: lighter;[m
[1mdiff --git a/pages/index.php b/pages/index.php[m
[1mindex 09b6bbf..d7a7104 100644[m
[1m--- a/pages/index.php[m
[1m+++ b/pages/index.php[m
[36m@@ -39,8 +39,8 @@[m
                             </div>[m
                             <div class="info">[m
                                 <h3><?=$recommendedArticle['title'] ?></h3>[m
[31m-                                <p><?=$recommendedArticle['sleeps'] ?></p>[m
[31m-                                <p><?=$recommendedArticle['price_per_day'] ?></p>[m
[32m+[m[32m                                <p>Sleeps: <?=$recommendedArticle['sleeps'] ?></p>[m
[32m+[m[32m                                <p>Price per day: <?=$recommendedArticle['price_per_day'] ?>$</p>[m
                             </div>                                                [m
                         </article>[m
                     </a>[m
