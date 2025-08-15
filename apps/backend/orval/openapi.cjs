module.exports = {
    'openapi': {
        input: '../resources/api/openapi.json',
        output: {
            baseUrl: process.env.API_URL,
            client: 'fetch',
            target: '../resources/js/lib/openapi.ts',
            schemas: '../resources/js/lib/schemas'
        },
    },
};
