$(document).ready(() => {
    let bar = $('.progress');
    let progress = $('.progress-bar');
    let status = $('.return');

    $('#upload').ajaxForm({
        url: '/ajax/upload.php',
        beforeSend: () => {
            bar.show();
            status.empty();
            let percentVal = '0%';
            progress.width(percentVal);
        },
        uploadProgress: (event, position, total, percentComplete) => {
            let percentVal = percentComplete + '%';
            progress.width(percentVal);
        },
        success: () => {
            let percentVal = '100%';
            progress.width(percentVal);
        },
        complete: data => {
            status.html(data.responseText);
            bar.hide();
        }
    });

    // copy to clipboard feature
    let clipboard = new ClipboardJS('.copylink');

    clipboard.on('success', () => {
        $('.copylink').html('Copied');
    });
});