let switcher = document.getElementById('switchTheme');

if(switcher != null) {
    switcher.addEventListener('click', () => {
        let htmlClasses = document.querySelector('html').classList;
        if (htmlClasses.contains('dark')) {
            htmlClasses.remove('dark');
        } else {
            htmlClasses.add('dark');
        };
    });
}
