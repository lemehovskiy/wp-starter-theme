const importPlaceholder = "//PLOP will add new import here (DO NOT REMOVE)";
const importPlaceholderPattern = /\/\/PLOP will add new import here \(DO NOT REMOVE\)/g;

module.exports = function (plop) {
    plop.setGenerator("builder", {
        description: "init ACF flexible content builder",
        prompts: [{
            type: "input",
            name: "name",
            message: "builder name please"
        }],
        actions: [
            {
                type: "add",
                path: "src/sass/{{name}}-builder/{{name}}-builder.scss",
                templateFile: "plop-templates/builder-index.scss.hbs"
            },
            {
                type: "modify",
                path: "src/sass/style.scss",
                pattern: importPlaceholderPattern,
                template: `@import "{{name}}-builder/{{name}}-builder.scss"; \r\n${importPlaceholder}`,
            }
        ]
    });
    plop.setGenerator("section", {
        description: "create ACF flexible content section",
        prompts: [
            {
                type: "input",
                name: "sectionName",
                message: "section name please"
            },
            {
                type: "input",
                name: "builderName",
                message: "builder name please"
            }
        ],
        actions: [
            {
                type: "add",
                path: "src/sass/{{builderName}}-builder/section-{{sectionName}}.scss",
                templateFile: "plop-templates/builder-section.scss.hbs"
            },
            {
                type: "add",
                path: "template-parts/{{builderName}}-builder/section-{{sectionName}}.php",
                templateFile: "plop-templates/builder-section.php.hbs"
            },
            {
                type: "modify",
                path: "src/sass/{{builderName}}-builder/{{builderName}}-builder.scss",
                pattern: importPlaceholderPattern,
                template: `@import "section-{{sectionName}}"; \r\n${importPlaceholder}`,
            }
        ]
    });
};