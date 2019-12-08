module.exports = function (plop) {
    // controller generator
    plop.setGenerator('controller', {
        description: 'application controller logic',
        prompts: [{
            type: 'input',
            name: 'name',
            message: 'controller name please'
        }],
        actions: [{
            type: 'add',
            path: 'src/sass/page_builder/section-{{name}}.js',
            templateFile: 'plop-templates/section.scss.hbs'
        }]
    });
};