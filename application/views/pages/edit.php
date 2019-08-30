<div class="middle">
	<div class="container">
		<main class="content">
           <div class="text">
               <p>Название: <?= $bookdetails['title'] ?></p>
               <p>Автор: <?= $bookdetails['author'] ?></p>
               <p>Жанр: <?= $bookdetails['genre'] ?></p>
               <p>Страниц: <?= $bookdetails['pages'] ?></p>
               <p>Аннотация: <?= $bookdetails['annotation'] ?></p>
               <form action="<?= base_url('pages/publishText/'.$bookdetails['id']) ?>" method="post">
                   <p>Поле для текста:<br>
                       <textarea id="inputtext" name="newchapter" rows="15"></textarea></p>
                   <p><input type='submit' value='Отправить'></p>
               </form>
            </div><!-- .text-->
		</main><!-- .content -->
	</div><!-- .container-->
	<aside class="left-sidebar">
		<?php
        echo "<p>".anchor('pages/overview/'.$bookdetails['id'], "Вернуться к описанию")."</p>";
        echo "<p>".anchor('pages/read/'.$bookdetails['id'], "Читать данную книгу")."</p>";
        echo "<p>".anchor("", "На главную")."</p>";
        ?>
	</aside><!-- .left-sidebar -->
</div>