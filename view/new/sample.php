<!--
	Parameters:
		title
		summary
		content
		author

  -->

<div class="section">
<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row the-article ">

<header class="the-article-header text-center">
            <p class="the-article-category">
                
                <?= $category ?>
                
            </p>
            <h1 class="the-article-title">
            	<?= $title ?>
        	</h1>
            <ul class="the-article-meta list-inline">
            	<li class="the-article-author">
                     <?= $author ?>
                </li>
                <li class="the-article-publish"> đăng vào lúc <?= $createDay ?></li>

                
            </ul>
            <strong > <?= $summary ?> </strong>
        </header>
	


<div class="the-article-body ">
	<?= $noidung ?> 
</div>


		</div>
	</div>
</div>
  
<style>
    .the-article-body{
        margin-top: 20px;
    }
</style>
