const PROXY_CONFIG = [
    {
        context: ['/chamada'],
        target : `http://localhost/rest/api/clientes`,
        secure: true,
        loglevel: 'debug',
        pathRewrite: { '^/chamada' : '' }

    }
];

module.exports = PROXY_CONFIG;