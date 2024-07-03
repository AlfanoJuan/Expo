import * as THREE from 'three';


class Particles
{
    constructor(texture, NumParticles, Color, MinSize, MaxSize, loadingManager)
    {
        const geometry = new THREE.BufferGeometry();
        const vertices = [];
        const materials = [];
        const textureLoader = new THREE.TextureLoader(loadingManager);
        this.ParticlesS = [];
        const particle_sprite = textureLoader.load( texture );

        for ( let i = 0; i < NumParticles; i ++ ) {
            const x = Math.random() * 2000 - 1000;
            const y = Math.random() * 2000 - 1000;
            const z = Math.random() * 2000 - 1000;
            vertices.push( x, y, z );
        }

        geometry.setAttribute( 'position', new THREE.Float32BufferAttribute( vertices, 3 ) );

        let parameters;
        parameters = [
            [[ 0.0, 0.0, 1.0 ], particle_sprite, 10 ]
        ];

        for ( let i = 0; i < parameters.length; i ++ ) {
            const sprite = parameters[ i ][ 1 ];
            const size = MinSize + Math.random() * (MaxSize - MinSize);
            materials[ i ] = new THREE.PointsMaterial( { 
                size: size, 
                map: sprite,
                color: new THREE.Color(Color),
                blending: THREE.AdditiveBlending, 
                depthTest: false, 
                transparent: true,
                opacity: 0.9,
                alphaMap: sprite,
            } );
            const particles = new THREE.Points( geometry, materials[ i ] );
            particles.rotation.x = Math.random() * 6;
            particles.rotation.y = Math.random() * 6;
            particles.rotation.z = Math.random() * 6;
            particles.scale.set(10, 10, 10);
            this.ParticlesS.push(particles);
        }
    }

    GetParticles()
    {
         return this.ParticlesS;
    }

    Render(time)
    {
        for ( let i = 0; i < this.ParticlesS.length; i ++ ) {
            const object = this.ParticlesS[ i ];
            if ( object instanceof THREE.Points ) {
                object.rotation.x = time * ( i < 4 ? i + 1 : - ( i + 1 ) );
            }
        }
    }
}

export {Particles};