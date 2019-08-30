<div class="middle">
		<div class="container">
			<main class="content">
			    <div class="text">
                    <p>Название: <?= $bookdetails['title'] ?></p>
                    <p>Автор: <?= $bookdetails['author'] ?></p>
                    <p>Жанр: <?= $bookdetails['genre'] ?></p>
                    <p>Страниц: <?= $bookdetails['pages'] ?></p>
                    <? foreach($text as $line):  ?>
                    <?= $line ?>
                    <? endforeach; ?>
				</div><!-- .container-->
			</main><!-- .content -->
		</div><!-- .container-->
		<aside class="left-sidebar">
			<?php
            echo "<p>".anchor('pages/overview/'.$bookdetails['id'], "Вернуться к описанию")."</p>";
            echo "<p>".anchor('pages/edit/'.$bookdetails['id'], "Дописать эту книгу")."</p>";
            echo "<p>".anchor("", "На главную")."</p>";
            ?>
		</aside><!-- .left-sidebar -->
	</div>