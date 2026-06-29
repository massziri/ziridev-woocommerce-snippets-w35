<?php
// WooCommerce Snippets by Ziri Dev — https://ziridev-fr.vercel.app

// 1. Message panier
add_action("woocommerce_before_cart", function() {
  echo "<div style='background:#f0f7ff;padding:12px;border-left:4px solid #0066cc;margin-bottom:20px;'>🚚 Livraison gratuite dès 50€</div>";
});

// 2. Stock restant
add_filter("woocommerce_get_availability", function($a, $p) {
  if ($p->managing_stock() && $p->get_stock_quantity() <= 5 && $p->get_stock_quantity() > 0) {
    $a["availability"] = sprintf("⚠️ Plus que %d en stock !", $p->get_stock_quantity());
  }
  return $a;
}, 10, 2);

// 3. Footer email
add_action("woocommerce_email_footer", function() {
  echo "<p style='text-align:center;color:#666;font-size:12px;'>Site by <a href='https://ziridev-fr.vercel.app'>Ziri Dev</a></p>";
});
