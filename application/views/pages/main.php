<div class="middle">
		<div class="container">
			<main class="content">
			    <div class="text">
                    <ul>
                        <? foreach($books as $book):  ?>
                        <li>
                            <p><?= anchor('pages/overview/'.$book['id'], $book['title']) ?></p>

                            <p>Автор: <?= $book['author'] ?></p>
                            <p>Жанр: <?= $book['genre'] ?></p>
                            <p>Страниц: <?= $book['pages'] ?></p>
                        </li>
                        <? endforeach; ?>
                    </ul>
				</div><!-- .container-->
			</main><!-- .content -->
		</div><!-- .container-->

		<aside class="left-sidebar">
		</aside><!-- .left-sidebar -->
</div>
