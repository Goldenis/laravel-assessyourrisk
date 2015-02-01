var _currentPath = '/';

$(document).ready(function() {


    $.address.externalChange(function(event) {

        console.log('external URL change')
        console.log(event.value)

        var oldPath = _currentPath;
        var newPath = event.value;
        console.log('currentPath', _currentPath);



        if (event.value == '/home' || event.value == '/' && event.value !== _currentPath) {

            //$.address.path('/home');
            console.log('GO HOME');
            
            if (_currentPath !== '/education' && _currentPath !== '/intro'){
                goHome();
            }
            else if (_currentPath === '/education')
            {
                toggleColumn();
            }
            else
            {
                // $.address.path('/assessment');
            }
            _currentPath = newPath;
        } else if (event.value == '/education') {
            console.log('education');
            
            $(window).hideIntro();
            window.addCharts();
            window.toggleColumn();
            _currentPath = newPath;
        } else if (event.value == '/assessment') {
            console.log('assessment');
            _currentPath = newPath;
            window.hideIntro();
            window.addCharts();
        } else {
            console.log('intro view')
            
            window.startIntro();
            $.address.path('/intro');
            _currentPath = newPath;
        };
        $('.vid-container').remove();
    });
});
