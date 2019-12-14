export function encodeForAjax(data) {
    return Object.keys(data).map(function(x) {
        return encodeURIComponent(x) + '=' + encodeURIComponent(data[x])
    }).join('&');
}