const importPlaceholder = '//PLOP will add new import here (DO NOT REMOVE)';
const importPlaceholderPattern = /\/\/PLOP will add new import here \(DO NOT REMOVE\)/g;

module.exports = function (plop) {
    plop.setGenerator('init builder', {
        description: 'init ACF flexible content builder',
        prompts: [{
            type: 'input',
            name: 'name',
            message: 'builder name please'
        }],
        actions: [
            {
                type: 'add',
                path: 'src/sass/{{name}}-builder/{{name}}-builder.scss',
                templateFile: 'plop-templates/builder-index.scss.hbs'
            },
            {
                type: 'modify',
                path: 'src/sass/style.scss',
                pattern: importPlaceholderPattern,
                template: `@import "{{name}}-builder/{{name}}-builder.scss"; \r\n${importPlaceholder}`,
            }
        ]
    });
};