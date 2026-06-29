---
version: alpha
name: Student Emotional Consultation Web with AI
description: A clean, editorial system with crisp typography, restrained color, and soft card-based hierarchy.
colors:
  primary: "#02838D"
  secondary: "#231F20"
  tertiary: "#E5E7EB"
  neutral: "#FFFFFF"
  surface: "#F3FBFC"
  on-surface: "#231F20"
  error: "#D92D20"
  primary-60: "#4FAFB6"
  primary-80: "#016C75"
  secondary-60: "#5B5758"
  neutral-95: "#FAFAFA"
typography:
  headline-display:
    fontFamily: "Proxima Nova Condensed"
    fontSize: 40px
    fontWeight: 700
    lineHeight: 1.15
    letterSpacing: 0px
  headline-lg:
    fontFamily: "Proxima Nova"
    fontSize: 24px
    fontWeight: 700
    lineHeight: 29px
    letterSpacing: 0px
  headline-md:
    fontFamily: "Proxima Nova"
    fontSize: 22px
    fontWeight: 700
    lineHeight: 29px
    letterSpacing: 0px
  headline-sm:
    fontFamily: "Proxima Nova"
    fontSize: 20px
    fontWeight: 600
    lineHeight: 24px
    letterSpacing: 0px
  body-lg:
    fontFamily: "Proxima Nova"
    fontSize: 18px
    fontWeight: 400
    lineHeight: 1.55
    letterSpacing: 0px
  body-md:
    fontFamily: "Proxima Nova"
    fontSize: 16px
    fontWeight: 400
    lineHeight: 26px
    letterSpacing: 0px
  body-sm:
    fontFamily: "Proxima Nova"
    fontSize: 15px
    fontWeight: 400
    lineHeight: 1.45
    letterSpacing: 0px
  label-lg:
    fontFamily: "Proxima Nova"
    fontSize: 16px
    fontWeight: 600
    lineHeight: 1.2
    letterSpacing: 0px
  label-md:
    fontFamily: "Proxima Nova"
    fontSize: 15px
    fontWeight: 700
    lineHeight: 1.2
    letterSpacing: 0px
  label-sm:
    fontFamily: "Proxima Nova"
    fontSize: 13px
    fontWeight: 600
    lineHeight: 1.2
    letterSpacing: 0px
rounded:
  none: 0px
  sm: 8px
  md: 16px
  lg: 26px
  xl: 32px
  full: 9999px
spacing:
  xs: 6px
  sm: 16px
  md: 24px
  lg: 40px
  xl: 52px
components:
  button-primary:
    backgroundColor: "{colors.primary}"
    textColor: "{colors.neutral}"
    typography: "{typography.label-md}"
    rounded: "{rounded.full}"
    padding: "6px 12px"
    height: "52px"
  button-primary-hover:
    backgroundColor: "{colors.primary-80}"
    textColor: "{colors.neutral}"
    typography: "{typography.label-md}"
    rounded: "{rounded.full}"
    padding: "6px 12px"
    height: "52px"
  button-secondary:
    backgroundColor: "{colors.neutral}"
    textColor: "{colors.primary}"
    typography: "{typography.label-md}"
    rounded: "{rounded.full}"
    padding: "6px 12px"
    height: "52px"
  button-tertiary:
    backgroundColor: "transparent"
    textColor: "{colors.on-surface}"
    typography: "{typography.body-sm}"
    rounded: "{rounded.none}"
    padding: "0px"
  card:
    backgroundColor: "{colors.neutral}"
    textColor: "{colors.on-surface}"
    rounded: "{rounded.sm}"
    padding: "{spacing.sm}"
  input:
    backgroundColor: "{colors.neutral}"
    textColor: "{colors.on-surface}"
    typography: "{typography.body-md}"
    rounded: "{rounded.sm}"
    padding: "{spacing.sm}"
---
# Healthline Editorial

## Overview
Healthline feels authoritative, approachable, and lightly energetic. The experience is built for broad consumer audiences seeking trustworthy health information without visual clutter or clinical coldness. The tone is professional first, but softened with generous whitespace, friendly teal accents, and rounded cards that keep the page feeling accessible.

## Colors
- **Primary (#02838D):** A distinct teal used for brand accents, links, CTAs, category labels, and subtle highlights. It signals freshness, health, and action without becoming loud.
- **Secondary (#231F20):** A deep near-black used for body text, headlines, and navigation. It provides strong contrast and keeps the editorial voice grounded and readable.
- **Tertiary (#E5E7EB):** A soft neutral line color for borders, separators, and understated framing. It helps define cards and interface edges without adding weight.
- **Neutral (#FFFFFF):** The main canvas for surfaces, cards, and button fills. White dominates the layout to preserve a clean, magazine-like feel.
- **Surface (#F3FBFC):** A pale aqua-tinted background that appears in large content areas and section washes. It adds gentle brand atmosphere while staying calm.
- **On-surface (#231F20):** The default text color on light backgrounds, chosen for maximum readability.
- **Error (#D92D20):** Reserved for alerts, validation, or critical states. It is not a visual emphasis color in the observed page, but should remain restrained.
- **Primary-60 (#4FAFB6) / Primary-80 (#016C75):** Useful support shades for hover states, secondary emphasis, and layered teal treatments.
- **Neutral-95 (#FAFAFA):** A near-white background option for subtle section alternation and low-contrast grouping.

## Typography
Healthline uses Proxima Nova as the core reading face, with Proxima Nova Condensed reserved for the most compact, attention-grabbing headline treatment. The system is strongly weight-based: headlines use 600–700 weight, while body copy stays regular for long-form readability. Labels and CTAs are bold and compact, making navigation and action points easy to scan.

Headlines are straightforward and highly legible, with no visible letter-spacing tricks or uppercase-heavy styling. The largest display treatment should feel editorial and confident, while smaller headings maintain the same clean sans-serif structure. Body text is comfortable at 16px with a 26px line height, supporting content-heavy reading contexts.

## Layout
The layout follows a wide, fixed-max-width editorial grid with generous side margins and large vertical spacing between sections. Content blocks are stacked in clear bands: dark global navigation, a slim trust strip, a colored hero field, then white content zones. The spacing rhythm is based on a small set of consistent increments, especially 6px, 16px, 24px, 40px, and 52px.

Cards and modules use moderate internal padding rather than dense packing, with breathing room around headlines, buttons, and illustrations. The overall layout favors horizontal alignment in grouped cards and a two-column article area below the hero. Large sections should remain airy rather than compact, reinforcing a calm and trustworthy reading environment.

## Elevation & Depth
The system is mostly flat, relying on contrast, whitespace, and card boundaries instead of dramatic shadows. Subtle elevation appears through white cards on tinted backgrounds and very light borders that separate modules from the page. The main depth cue is compositional layering: hero background, floating cards, and content blocks arranged by proximity rather than shadow.

When emphasis is needed, use clean borders and tonal separation before adding shadow. Any shadow should stay soft and minimal so the interface never feels glossy or heavy.

## Shapes
The shape language is friendly and rounded, but not playful. Cards use an 8px radius for soft edges, while buttons become fully pill-shaped with a 26px radius or full rounding. This creates a contrast between editorial content surfaces and action controls, keeping the brand approachable and modern.

Illustration containers, image tiles, and small UI chips should follow the same restrained softness. Avoid sharp corners for primary interface elements unless a component is explicitly meant to feel utilitarian.

## Components
Buttons are the clearest branded interaction pattern. Primary buttons use teal fills with white text, bold label typography, pill rounding, and compact horizontal padding. Secondary buttons invert this relationship with a white fill and teal border/text. Tertiary actions should remain visually quiet, using transparent backgrounds and simple text styling.

Use `button-primary` for high-priority calls to action and `button-secondary` for supportive alternatives. Hover states should deepen the teal slightly using `button-primary-hover`. Button sizing should remain medium and stable, with a minimum height around 52px so tap targets feel comfortable on both mobile and desktop.

Cards are white, lightly bordered, and softly rounded. The `card` token should be used for content modules, article teasers, and promotional panels. Keep card interiors moderately padded and avoid heavy shadows so the page retains its clean editorial feel.

Inputs should mirror cards in their calmness: white backgrounds, subtle borders, rounded corners, and readable Proxima Nova text. Focus states should use teal rather than decorative effects. Error states should be clear but not alarming, preserving the site’s reassuring tone.

Navigation and links are understated rather than ornamental. Top-level navigation can use bold, compact labels, while inline links should feel simple and accessible. Chips, section labels, and category tags should use teal text or accent treatment without becoming over-saturated.

## Do's and Don'ts
- Do keep layouts airy, with generous whitespace around hero content and article clusters.
- Do use teal sparingly for calls to action, category labels, and trust signals.
- Do keep headlines bold and readable; let the typography do most of the visual work.
- Do use rounded cards and pill buttons to maintain the friendly, approachable tone.
- Don't introduce heavy shadows, glossy gradients, or dramatic depth effects.
- Don't overuse the accent color in body copy or large background areas.
- Don't tighten spacing so much that the editorial layout feels cramped or dense.
- Don't replace the clean sans-serif system with decorative or highly stylized typefaces.