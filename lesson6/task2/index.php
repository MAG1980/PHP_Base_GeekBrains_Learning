<div id="app">
	<input type="text" id="val1" value="">
	<span id="buttons">
		<button class='action' value="summ">+</button>
		<button class='action' value="substr">-</button>
		<button class='action' value="mul">*</button>
		<button class='action' value="div">/</button>
	</span>
	<input type="text" id="val2" value="">
	<button class='action'> =</button>
	<input type="text" id="val3" value=""><br></div>

<script>
	window.onload = function () {
		const app = document.querySelector( "#app" )
		const span = app.querySelector( "#buttons" );
		span.addEventListener( 'click', ( event ) => {

			let operand1 = app.querySelector( "#val1" ).value;
			console.log( operand1 );
			let operand2 = app.querySelector( "#val2" ).value;
			console.log( operand2 );
			let operation = event.target.value;
			console.log( operation );

			( async () => {
					const response = await fetch( 'actions.php', {
						method: 'POST',
						headers: new Headers( {
							'Content-Type': 'application/json'
						} ),
						body: JSON.stringify( {
							operand1,
							operand2,
							operation,
						} ), // body data type must match "Content-Type" header
					} );
					let obj = await response.json();
					console.log( document.querySelector( '#val3' ) );
					document.querySelector( '#val3' ).value = obj['result'];
				}
			)()
		} )
	}
</script>

	