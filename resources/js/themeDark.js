if (localStorage.theme === 'dark' ||
    (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches))
{
    document.documentElement.classList.add('dark')
} else {
    document.documentElement.classList.remove('dark')
}

let switcher = document.getElementById('switchTheme');

if(switcher != null) {
    switcher.addEventListener('click', () => {
        let htmlClasses = document.querySelector('html').classList;
        if (localStorage.theme == 'dark') {
            htmlClasses.remove('dark');
            localStorage.removeItem('theme')
        } else {
            htmlClasses.add('dark');
            localStorage.theme = 'dark';
        }
    });
}
