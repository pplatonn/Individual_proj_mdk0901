'use strict'

function getCookie(name) {
  const value = `; ${document.cookie}`;
  const parts = value.split(`; ${name}=`);
  if (parts.length === 2) return parts.pop().split(';').shift();
}

function setCookie(name, value, days = 365) {
  const date = new Date();
  date.setTime(date.getTime() + (days*24*60*60*1000));
  document.cookie = `${name}=${value}; expires=${date.toUTCString()}; path=/`;
}

document.addEventListener('DOMContentLoaded', () => {
  const savedTheme = getCookie('theme');
  if (savedTheme) {
    document.documentElement.setAttribute('data-theme', savedTheme);
  }

  document.getElementById('changeTheme').addEventListener('click', () => {
    const html = document.documentElement;
    const isDark = html.getAttribute('data-theme') === 'dark';
    const newTheme = isDark ? 'light' : 'dark';
    html.setAttribute('data-theme', newTheme);
    setCookie('theme', newTheme);
  });
});