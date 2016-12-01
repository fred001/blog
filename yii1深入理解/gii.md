# Gii

文件目录  framework/gii

通过代码生成必要属性， 通过模版文件创建内容，再写入对应文件
每个生成功能都有模版， 写入通过 CCodeFile.php的 file_put_contents完成

/var/www/html/anchu2/framework/gii/
|-- assets
|-- CCodeFile.php
|-- CCodeForm.php
|-- CCodeGenerator.php
|-- CCodeModel.php
|-- components
|   |-- Pear
|   |   `-- Text
|   |       |-- Diff
|   |       |   |-- Engine
|   |       |   |   |-- native.php
|   |       |   |   |-- shell.php
|   |       |   |   |-- string.php
|   |       |   |   `-- xdiff.php
|   |       |   |-- Mapped.php
|   |       |   |-- Renderer
|   |       |   |   |-- context.php
|   |       |   |   |-- inline.php
|   |       |   |   `-- unified.php
|   |       |   |-- Renderer.php
|   |       |   `-- ThreeWay.php
|   |       |-- Diff3.php
|   |       `-- Diff.php
|   |-- TextDiff.php
|   `-- UserIdentity.php
|-- controllers
|   `-- DefaultController.php
|-- generators
|   |-- controller
|   |   |-- ControllerCode.php
|   |   |-- ControllerGenerator.php
|   |   |-- templates
|   |   |   `-- default
|   |   |       |-- controller.php
|   |   |       `-- view.php
|   |   `-- views
|   |       `-- index.php
|   |-- crud
|   |   |-- CrudCode.php
|   |   |-- CrudGenerator.php
|   |   |-- templates
|   |   |   `-- default
|   |   |       |-- admin.php
|   |   |       |-- controller.php
|   |   |       |-- create.php
|   |   |       |-- _form.php
|   |   |       |-- index.php
|   |   |       |-- _search.php
|   |   |       |-- update.php
|   |   |       |-- _view.php
|   |   |       `-- view.php
|   |   `-- views
|   |       `-- index.php
|   |-- form
|   |   |-- FormCode.php
|   |   |-- FormGenerator.php
|   |   |-- templates
|   |   |   `-- default
|   |   |       |-- action.php
|   |   |       `-- form.php
|   |   `-- views
|   |       `-- index.php
|   |-- model
|   |   |-- ModelCode.php
|   |   |-- ModelGenerator.php
|   |   |-- templates
|   |   |   `-- default
|   |   |       `-- model.php
|   |   `-- views
|   |       `-- index.php
|   `-- module
|       |-- ModuleCode.php
|       |-- ModuleGenerator.php
|       |-- templates
|       |   `-- default
|       |       |-- controllers
|       |       |   `-- DefaultController.php
|       |       |-- module.php
|       |       `-- views
|       |           `-- default
|       |               `-- index.php
|       `-- views
|           `-- index.php
|-- GiiModule.php
|-- models
|   `-- LoginForm.php
`-- views
    |-- common
    |   |-- code.php
    |   |-- diff.php
    |   `-- generator.php
    |-- default
    |   |-- error.php
    |   |-- index.php
    |   `-- login.php
    `-- layouts
        |-- column1.php
        |-- generator.php
        `-- main.php

41 directories, 91 files
