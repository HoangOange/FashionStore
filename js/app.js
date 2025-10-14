/* ============================================================
   app.js — Tập trung điều khiển hành vi giao diện FashionStore
   ============================================================ */

document.addEventListener("DOMContentLoaded", () => {
  // ==================== TOGGLE MENU ====================
  const menuToggle = document.querySelector(".menu-toggle");
  const menuClose = document.querySelector(".menu-close");
  const navbar = document.querySelector(".navbar");

  if (menuToggle && menuClose && navbar) {
    menuToggle.addEventListener("click", () => {
      navbar.classList.add("active");
    });
    menuClose.addEventListener("click", () => {
      navbar.classList.remove("active");
    });
  }

  // ==================== CART ICON ====================
  const cartIcon = document.querySelector(".cart");
  if (cartIcon) {
    cartIcon.addEventListener("click", () => {
      alert("🛒 Tính năng giỏ hàng đang được phát triển!");
    });
  }

  // ==================== AUTH LINK ====================
  const authLink = document.querySelector(".auth a");
  if (authLink) {
    authLink.addEventListener("click", (e) => {
      e.preventDefault();
      window.location.href = "login.html";
    });
  }

  // ==================== SEARCH BOX ====================
  const searchInput = document.querySelector("header input[type='text']");
  if (searchInput) {
    searchInput.addEventListener("keypress", (e) => {
      if (e.key === "Enter") {
        e.preventDefault();
        alert(`🔍 Tìm kiếm: ${searchInput.value}`);
      }
    });
  }

  // ==================== PAY PAGE ACTIONS ====================
  const continueBtn = document.querySelector(".checkout-actions .btn:not(.primary)");
  const payBtn = document.querySelector(".checkout-actions .btn.primary");

  if (continueBtn) {
    continueBtn.addEventListener("click", () => {
      window.location.href = "index.html";
    });
  }

  if (payBtn) {
    payBtn.addEventListener("click", () => {
      const nameInput = document.querySelector("input[placeholder='Nhập họ và tên']");
      if (!nameInput || nameInput.value.trim() === "") {
        alert("Vui lòng nhập đầy đủ thông tin khách hàng!");
        return;
      }
      alert("✅ Cảm ơn bạn đã thanh toán! Đơn hàng của bạn đang được xử lý.");
      window.location.href = "index.html";
    });
  }

  // ==================== FOOTER YEAR AUTO UPDATE ====================
  const footerText = document.querySelector("footer p");
  if (footerText && footerText.textContent.includes("©")) {
    const year = new Date().getFullYear();
    footerText.textContent = `© ${year} FashionStore - Bản quyền thuộc về chúng tôi`;
  }

  // ==================== RESPONSIVE SUPPORT ====================
  window.addEventListener("resize", () => {
    if (window.innerWidth > 768 && navbar) {
      navbar.classList.remove("active");
    }
  });

  console.log("✅ FashionStore app.js đã khởi động thành công!");
});
