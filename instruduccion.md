Hola Hermano.

Muy bien para comenzar necesitamos organizar la estructura de tu proyecto y otros asuntos mas.

1. Debes tener una cuenta en github porque esto te permite tener un control de versiones y al trabajar con mas personas en tu equipo te ayuda a mantener un control de lo que hace cada quien y mantener una version estable, si algun compañero hace algo mal o incluso tu, la version estable se mantiene sin errores.
2. Ajustar la estructura de carpetas, porque asi evitas errores y duplicidad o archivos innecesarios. Normalmente, la estructura se maneja por el codigo backend, los recursos y las vistas.

En un proyecto PDO de PHP nativo seria algo como esto.

- **app**: archivos de la aplicacion como tal, aqui tienes todos lo que funcionan como controladores, modelos y configuraciones, es decir el cerebro de tu aplicacion.
- **Controladores (Controllers)**: Es la seccion que interactua entre los modelos y las vistas, debes enfocar la mayor parte de la logica en estos archivos.
- **Modelos (Models)**: Es el que maneja todas las operaciones relacionadas con base de datos, el recibe los parametros del controlador procesa y retorna al controlador los resultados.
- config: son ficheros para configurar la aplicacion un ejemplo es la conexion a base de datos y otros compendio que sea necesario.
- **assets**: aqui estan los recursos css, js y otros que sean necesarios.
- **views** o **vistas**: aqui mantienes las vista del aplicativo, deberia entrar dentro de la carpeta app pero para iniciar es mejor mantenerlo afuera de momento.
- **layouts**: es una carpeta que se encuentra dentro de las vistas porque aqui se encuentran el esqueleto visual de la aplicacion.
- **Variables de entorno (.env)**: Es un archivo muy importante en todos los proyectos, lleva un punto delante porque para sistemas operativos linux es un fichero oculto, porque es tan importante porque aqui manejas todas las variables de manera segura y si tener que estar dejandolas en codigo duro.