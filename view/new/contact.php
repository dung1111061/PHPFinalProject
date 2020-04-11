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
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3918.5114940690805!2d106.63222!3d10.8486468!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529b4db0ae3e3%3A0x43b01ca5828e0dfa!2zMTEvMzggxJDDtG5nIEjGsG5nIFRodeG6rW4gMTcsIMSQw7RuZyBIxrBuZyBUaHXhuq1uLCBRdeG6rW4gMTIsIEjhu5MgQ2jDrSBNaW5o!5e0!3m2!1svi!2s!4v1586264248099!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>


		</div>
	</div>
</div>
  
<style>
    .the-article-body{
        margin-top: 20px;
    }
</style>
