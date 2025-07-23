fetch('cars.json')
  .then(response => response.json())
  .then(cars => {
    const container = document.getElementById('car-list');
    cars.forEach(car => {
      const div = document.createElement('div');
      div.className = 'car-item';
      div.innerHTML = `
        <img src="images/${car.image}" alt="${car.model}">
        <h3>${car.model}</h3>
        <p>Year: ${car.year}</p>
        <p>Price: R${parseFloat(car.price).toLocaleString()}</p>
      `;
      container.appendChild(div);
    });
  });
