<?php require 'navbar-top.php' ?>

<main>
	<div>
	  	<form action="store-event.php" method="post">
			<div>
			    <input type="text" id="tite" name="title">
			    <label for="sample1">Tittel</label>
		  	</div>
		  	<div>
				<div>
				    <input type="date" name="date">
			  	</div>
				<div>
				    <input type="time" name="time">
			  	</div>
		  	</div>
		  	<div>
		    	<textarea type="text" rows= "3" id="description" name="description"></textarea>
		    	<label for="description">Beskrivelse</label>
		  	</div>
			<div>
			    <input type="text" id="tite" name="image-path">
			    <label for="sample1">Bilde-URL</label>
		  	</div>
				<div>
						<input type="text" id="kategori" name="kategori">
						<label for="sample1">Kategori</label>
					</div>
		  	<label for="is-free">
			  	<input type="checkbox" id="is-free" name="is-free" checked>
			  	<span>Gratis påmelding</span>
			</label>
		  	<button>
			  	Legg til event
			</button>
		</form>
	</div>
</main>
