document.addEventListener("DOMContentLoaded", function () {
  fetch("ai_data.php")
    .then(response => response.json())
    .then(data => {
      window.allData = data; // Store the data for filtering
      renderData(data);
    })
    .catch(error => {
      console.error("Error fetching AI data:", error);
    });
});

function renderData(data) {
  const aiList = document.getElementById("ai-list");
  aiList.innerHTML = ""; // Clear previous content

  // Iterate over each category in the data
  for (let category in data) {
    // Create category header
    const categoryTitle = document.createElement("div");
    categoryTitle.className = "category-title";
    categoryTitle.textContent = category;
    aiList.appendChild(categoryTitle);

    // Create a card for each AI in the category
    data[category].forEach(ai => {
      const card = document.createElement("div");
      card.className = "ai-card";
      card.innerHTML = `
        <h3>${ai.name}</h3>
        <img src="${ai.logo}" alt="${ai.name} logo" class="ai-logo">
        <h3>${ai.name}</h3>
        <a href="${ai.url}" target="_blank">Visit</a>
      `;
      aiList.appendChild(card);
    });
  }
}

function searchAI() {
  const searchQuery = document.getElementById("search").value.toLowerCase();
  const filteredData = {};

  // Filter each category's items based on the search query
  for (let category in window.allData) {
    const matches = window.allData[category].filter(ai =>
      ai.name.toLowerCase().includes(searchQuery)
    );
    if (matches.length > 0) {
      filteredData[category] = matches;
    }
  }
  renderData(filteredData);
}
