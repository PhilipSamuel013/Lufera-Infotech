<?php include './partials/layouts/layoutTop.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Websites</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f9fafb;
      margin: 0;
      padding: 20px;
    }

    .web-section-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 16px;
    }

    .web-section-header h1 {
      font-size: 22px !important;
      margin: 0;
    }

    .web-add-btn {
      background-color: #facc15;
      border: none;
      padding: 10px 16px;
      font-weight: bold;
      border-radius: 6px;
      cursor: pointer;
    }

    .web-filters {
      display: flex;
      gap: 10px;
      margin-bottom: 20px;
      flex-wrap: wrap;
      align-items: center;
    }

    .web-filters input,
    .web-filters select {
      padding: 8px 12px;
      border: 1px solid #d1d5db;
      border-radius: 6px;
    }

    .web-fav-toggle {
      font-size: 18px;
      background: none;
      border: none;
      color: #facc15;
      cursor: pointer;
    }

    .websites-list-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: #fff;
      padding: 14px 20px;
      margin-bottom: 10px;
      border-radius: 6px;
      box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    }

    .web-info {
      display: flex;
      flex-direction: column;
    }

    .web-info h3 {
      margin: 0;
      font-size: 16px !important;
      color: #111827;
    }

    .web-info a {
      color: #3b82f6;
      font-size: 14px;
      text-decoration: none;
    }

    .web-action-right {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .web-dashboard-btn {
      background-color: #facc15;
      border: none;
      padding: 8px 12px;
      border-radius: 6px;
      font-weight: 600;
      cursor: pointer;
    }

    .web-menu-btn {
      background: none;
      border: none;
      font-size: 20px;
      cursor: pointer;
    }

    .web-dropdown {
      position: absolute;
      background: white;
      border: 1px solid #e5e7eb;
      border-radius: 6px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      display: none;
      flex-direction: column;
      min-width: 160px;
      z-index: 10;
    }

    .web-dropdown button {
      padding: 10px 14px;
      border: none;
      background: white;
      text-align: left;
      cursor: pointer;
    }

    .web-dropdown button:hover {
      background: #f3f4f6;
    }

    .web-menu-wrapper {
      position: relative;
    }
  </style>
</head>
<body>

<!-- Header -->
<div class="web-section-header">
  <h1>Website</h1>
  <button class="web-add-btn">+ Add Hosting Plan</button>
</div>

<!-- Filters -->
<div class="web-filters">
  <input type="text" id="webSearch" placeholder="Search websites...">
  <select id="webTagFilter">
    <option value="">Filter by tag</option>
    <option value="blog">Blog</option>
    <option value="ecommerce">E-Commerce</option>
    <option value="portfolio">Portfolio</option>
  </select>
  <button class="web-fav-toggle" id="favToggle">&#9733;</button>
</div>

<!-- Website Rows -->
<div id="websitesContainer">

  <div class="websites-list-row" data-name="My Blog Site" data-tag="blog" data-fav="1">
    <div class="web-info">
      <!-- <h3>My Blog Site</h3> -->
      <a href="https://anandtra.lufera.in/" style="color: black" target="_blank">anandtra.lufera.in</a>
    </div>
    <div class="web-action-right">
      <button class="web-dashboard-btn">Dashboard</button>
      <div class="web-menu-wrapper">
        <button class="web-menu-btn" onclick="toggleWebMenu(this)">⋮</button>
        <div class="web-dropdown">
          <button onclick="alert('Add to Favorite')">Add to Fav.</button>
          <button onclick="alert('Change Domain')">Change Domain</button>
          <button onclick="alert('Deleted')">Delete</button>
        </div>
      </div>
    </div>
  </div>

  <div class="websites-list-row" data-name="Ecom Shop" data-tag="ecommerce" data-fav="0">
    <div class="web-info">
      <!-- <h3>Ecom Shop</h3> -->
      <a href="https://luferatech.com/" style="color: black" target="_blank">luferatech.com</a>
    </div>
    <div class="web-action-right">
      <button class="web-dashboard-btn">Dashboard</button>
      <div class="web-menu-wrapper">
        <button class="web-menu-btn" onclick="toggleWebMenu(this)">⋮</button>
        <div class="web-dropdown">
          <button onclick="alert('Add to Favorite')">Add to Fav.</button>
          <button onclick="alert('Change Domain')">Change Domain</button>
          <button onclick="alert('Deleted')">Delete</button>
        </div>
      </div>
    </div>
  </div>

  <div class="websites-list-row" data-name="John Portfolio" data-tag="portfolio" data-fav="1">
    <div class="web-info">
      <!-- <h3>John Portfolio</h3> -->
      <a href="https://landscapeimmigration.com/" style="color: black" target="_blank">landscapeimmigration.com</a>
    </div>
    <div class="web-action-right">
      <button class="web-dashboard-btn">Dashboard</button>
      <div class="web-menu-wrapper">
        <button class="web-menu-btn" onclick="toggleWebMenu(this)">⋮</button>
        <div class="web-dropdown">
          <button onclick="alert('Add to Favorite')">Add to Fav.</button>
          <button onclick="alert('Change Domain')">Change Domain</button>
          <button onclick="alert('Deleted')">Delete</button>
        </div>
      </div>
    </div>
  </div>

</div>

<script>
  const searchInput = document.getElementById('webSearch');
  const tagFilter = document.getElementById('webTagFilter');
  const favToggle = document.getElementById('favToggle');
  const websitesContainer = document.getElementById('websitesContainer');
  let showFavOnly = false;

  function filterWebsites() {
    const search = searchInput.value.toLowerCase();
    const tag = tagFilter.value;

    document.querySelectorAll('.websites-list-row').forEach(row => {
      const name = row.dataset.name.toLowerCase();
      const siteTag = row.dataset.tag;
      const isFav = row.dataset.fav === '1';

      const matchesSearch = name.includes(search);
      const matchesTag = !tag || tag === siteTag;
      const matchesFav = !showFavOnly || isFav;

      row.style.display = (matchesSearch && matchesTag && matchesFav) ? 'flex' : 'none';
    });
  }

  searchInput.addEventListener('input', filterWebsites);
  tagFilter.addEventListener('change', filterWebsites);
  favToggle.addEventListener('click', () => {
    showFavOnly = !showFavOnly;
    favToggle.style.color = showFavOnly ? '#f59e0b' : '#facc15';
    filterWebsites();
  });

  function toggleWebMenu(btn) {
    const dropdown = btn.nextElementSibling;
    document.querySelectorAll('.web-dropdown').forEach(menu => {
      if (menu !== dropdown) menu.style.display = 'none';
    });
    dropdown.style.display = dropdown.style.display === 'flex' ? 'none' : 'flex';
  }

  window.addEventListener('click', function(e) {
    if (!e.target.matches('.web-menu-btn')) {
      document.querySelectorAll('.web-dropdown').forEach(menu => {
        menu.style.display = 'none';
      });
    }
  });
</script>

</body>
</html>


<?php include './partials/layouts/layoutBottom.php' ?>