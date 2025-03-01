export class ReviewStars {
  constructor() {
    // Look for asterisks in wp-block-quote > p
    const reviews = document.querySelectorAll('.wp-block-quote > p');
    reviews.forEach((review) => {
      const text = review.textContent!;

      if (text.includes('*')) {
        // Wrap the existing text in a span, replace the asterisks with stars
        const stars = document.createElement('span');
        stars.classList.add('review-stars');
        stars.innerHTML =
          '<span class="px-0.5 inline-block">&#9733;</span>'.repeat(
            text.match(/\*/g)!.length
          );
        review.innerHTML = `<span class="review-text">${text.replace(
          /\s?\*/g,
          ''
        )}</span>`;
        review.appendChild(stars);
        review.classList.add('has-stars');
      } else {
        // Wrap with <span class="review-text"> if there are no asterisks
        review.innerHTML = `<span class="review-text">${text}</span>`;
      }
    });
  }
}
