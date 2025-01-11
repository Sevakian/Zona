import pluginVue from 'eslint-plugin-vue';
import vueTsEslintConfig from '@vue/eslint-config-typescript';
import skipFormatting from '@vue/eslint-config-prettier/skip-formatting';
import tailwindcssPlugin from 'eslint-plugin-tailwindcss';
import typescriptEslintPlugin from '@typescript-eslint/eslint-plugin';
import typescriptEslintParser from '@typescript-eslint/parser';
import prettierPlugin from 'eslint-plugin-prettier';

export default [
  {
    name: 'app/files-to-lint',
    files: ['**/*.{ts,mts,tsx,vue}'],
  },

  {
    name: 'app/files-to-ignore',
    ignores: ['**/dist/**', '**/dist-ssr/**', '**/coverage/**'],
  },

  {
    name: 'typescript',
    languageOptions: {
      parser: typescriptEslintParser,
      parserOptions: {
        project: './tsconfig.json',
      },
    },
    plugins: {
      '@typescript-eslint': typescriptEslintPlugin,
    },
    rules: {
      ...typescriptEslintPlugin.configs.recommended.rules,
    },
  },

  ...pluginVue.configs['flat/essential'],
  ...vueTsEslintConfig(),
  skipFormatting,

  {
    name: 'prettier',
    plugins: {
      prettier: prettierPlugin,
    },
    rules: {
      'prettier/prettier': 'warn',
    },
  },

  {
    name: 'tailwindcss',
    plugins: {
      tailwindcss: tailwindcssPlugin,
    },
    rules: {
      'tailwindcss/classnames-order': 'warn',
      'tailwindcss/enforces-shorthand': 'warn',
      'tailwindcss/no-custom-classname': 'off',
    },
  },
];
