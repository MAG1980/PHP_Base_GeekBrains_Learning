'use strict'

const checkoutButton = document.querySelector( '.cart__button-checkout' );
const cartCheckoutForm = document.querySelector( '.cart__checkout-form' );
console.log( checkoutButton );
console.log( cartCheckoutForm );
checkoutButton.addEventListener( 'click', () => {
	cartCheckoutForm.classList.remove( 'dn' );
	checkoutButton.classList.add( 'dn' );
	console.log( 'click' )
} )