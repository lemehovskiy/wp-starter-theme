# Fontello scripts

### open

```sh
make -f fontello
```

### save

```sh
make -f fontello fontsave
```

## PLOP Micro-generator framework

### Init builder

```sh
plop builder {{builder-name}} 
```

#### In result you should have structure like this:

     ├── ...
     └── wp-starter-theme
         ├── ...
         └── src
             ├── ...
             └── sass
                 ├── ...
                 ├── {{builder-name}}-builder
                 │   └── {{builder-name}}-builder.scss
                 └── ...
     
##### And import {{builder-name}}-builder.scss to style.scss

### Builder section

```sh
plop section {{section-name}} {{builder-name}} 
```

#### In result you should have structure like this:

##### SASS:

     ├── ...
     └── wp-starter-theme
         ├── ...
         └── src
             ├── ...
             └── sass
                 ├── ...
                 ├── {{builder-name}}-builder
                 |   ├── {{builder-name}}-builder.scss
                 │   └── {{section-name}}-intro-1.scss
                 └── ...
     
##### And import {{section-name}}-builder.scss to {{builder-name}}-builder.scss

##### PHP:

     ├── ...
     └── wp-starter-theme
         ├── ...
         └── template-parts
             ├── ...
             └── {{builder-name}}-builder
                 └── section-{{section-name}}.php